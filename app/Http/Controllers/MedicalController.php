<?php

namespace App\Http\Controllers;

use App\Helpers\AuditLogger;
use App\Models\Medical;
use App\Models\Applicant;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function index(Request $request)
{
    $query = \App\Models\Medical::with('applicant');

    // Search by applicant name
    if ($request->filled('search')) {
        $query->whereHas('applicant', function ($q) use ($request) {
            $q->where('fname', 'like', '%' . $request->search . '%')
              ->orWhere('lname', 'like', '%' . $request->search . '%');
        });
    }

    // Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter by sex
    if ($request->filled('sex')) {
        $query->whereHas('applicant', function ($q) use ($request) {
            $q->where('sex', $request->sex);
        });
    }

    $medicals = $query->latest()->paginate(15)->appends($request->all());

    return view('client.medicals.index', compact('medicals'));
}


    public function create()
    {
        $applicants = Applicant::all();
        return view('client.medicals.create', compact('applicants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'exam_date' => 'required|date',
            'clinic_name' => 'required|string',
            'findings' => 'nullable|string',
            'status' => 'required|in:fit,unfit,pending',
        ]);

        $medical = Medical::create($request->all());
        AuditLogger::log('create', 'Medical', $medical->id, $medical->all());

        return redirect()->route('client.medicals.index')->with('success', 'Medical record added.');
    }


    public function edit(Medical $medical)
    {
        $applicants = Applicant::all();
        return view('client.medicals.edit', compact('medical', 'applicants'));
    }

    public function update(Request $request, Medical $medical)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'exam_date' => 'required|date',
            'clinic_name' => 'required|string',
            'findings' => 'nullable|string',
            'status' => 'required|in:fit,unfit,pending',
        ]);

        $medical->update($request->all());
        $old = $medical->toArray();
        $medical->update($request->all());

        $changes = [
            'before' => $old,
            'after' => $medical->fresh()->toArray(),
        ];

        AuditLogger::log('update', 'Medical', $medical->id, $changes);

        return redirect()->route('client.medicals.index')->with('success', 'Medical record updated.');
    }

    public function destroy(Medical $medical)
    {
        AuditLogger::log('delete', 'Medical', $medical->id, $medical->toArray());
        $medical->delete();
        return redirect()->route('client.medicals.index')->with('success', 'Medical record deleted.');
    }
}
