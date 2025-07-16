<?php

namespace App\Http\Controllers;

use App\Helpers\AuditLogger;
use App\Models\JobOpening;
use Illuminate\Http\Request;

class JobOpeningController extends Controller
{
    public function index(Request $request)
{
    $query = JobOpening::query();

    if ($request->filled('job_title')) {
        $query->where('job_title', 'like', '%' . $request->job_title . '%');
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    if ($request->filled('date_from') && $request->filled('date_to')) {
        $query->whereBetween('date_needed', [$request->date_from, $request->date_to]);
    }

    $jobs = $query->latest()->paginate(15);

    return view('client.jobs.index', compact('jobs'));
}


     public function create()
    {
        return view('client.jobs.create');
    }


     public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'date_needed' => 'required|date',
            'date_expiry' => 'nullable|date',
            'status' => 'required|in:active,inactive,expired',
            'location' => 'nullable|string|max:255',
        ]);

        $job = JobOpening::create($request->all());
        AuditLogger::log('create', 'JobOpening', $job->id, $request->all());

        return redirect()->route('client.jobs.index')->with('success', 'Job posted successfully.');
    }


    public function edit(JobOpening $job)
    {
        return view('client.jobs.edit', compact('job'));
    }

    public function update(Request $request, JobOpening $job)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'date_needed' => 'required|date',
            'date_expiry' => 'nullable|date',
            'status' => 'required|in:active,inactive,expired',
            'location' => 'nullable|string|max:255',
        ]);

        $job->update($request->all());
        $old = $job->toArray();
        $job->update($request->all());

        $changes = [
            'before' => $old,
            'after' => $job->fresh()->toArray(),
        ];

        AuditLogger::log('update', 'JobOpening', $job->id, $changes);


        return redirect()->route('client.jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(JobOpening $job)
    {
        AuditLogger::log('delete', 'JobOpening', $job->id, $job->toArray());
        $job->delete();
        return redirect()->route('client.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
