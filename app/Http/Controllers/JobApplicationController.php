<?php

namespace App\Http\Controllers;

use App\Helpers\AuditLogger;
use App\Models\Applicant;
use App\Models\JobOpening;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request)
{
    $query = \App\Models\JobApplication::with(['applicant', 'jobOpening']);

    if ($request->filled('search')) {
        $query->whereHas('applicant', function ($q) use ($request) {
            $q->where('fname', 'like', '%' . $request->search . '%')
              ->orWhere('lname', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('job_title')) {
        $query->whereHas('jobOpening', function ($q) use ($request) {
            $q->where('job_title', 'like', '%' . $request->job_title . '%');
        });
    }

    $applications = $query->latest()->paginate(15)->appends($request->all());

    return view('client.job_applications.index', compact('applications'));
}


     public function create()
    {
        $applicants = Applicant::all();
        $jobOpenings = JobOpening::all();
        return view('client.job_applications.create', compact('applicants', 'jobOpenings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'job_opening_id' => 'required|exists:job_openings,id',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $job_application = JobApplication::create($request->all());
        AuditLogger::log('create', 'JobApplication', $job_application->id, $request->all());


        return redirect()->route('client.job_applications.index')->with('success', 'Job application submitted.');
    }

    public function show(\App\Models\JobApplication $job_application)
    {
        $job_application->load(['applicant', 'jobOpening']);
        return view('client.job_applications.show', compact('job_application'));
    }



    public function edit(JobApplication $job_application)
    {
        $applicants = Applicant::all();
        $jobOpenings = JobOpening::all();
        return view('client.job_applications.edit', compact('job_application', 'applicants', 'jobOpenings'));
    }

    public function update(Request $request, JobApplication $job_application)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'job_opening_id' => 'required|exists:job_openings,id',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $job_application->update($request->all());
        $old = $job_application->toArray();
        $job_application->update($request->all());

        $changes = [
            'before' => $old,
            'after' => $job_application->fresh()->toArray(),
        ];

        AuditLogger::log('update', 'job$job_application', $job_application->id, $changes);


        return redirect()->route('client.job_applications.index')->with('success', 'Application updated.');
    }

    public function destroy(JobApplication $job_application)
    {
        AuditLogger::log('delete', 'JobApplication', $job_application->id, $job_application->toArray());
        $job_application->delete();
        return redirect()->route('client.job_applications.index')->with('success', 'Application deleted.');
    }
}
