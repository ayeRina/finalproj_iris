<?php

namespace App\Http\Controllers;

use App\Helpers\AuditLogger;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicantController extends Controller
{
    public function index(Request $request)
{
    $query = Applicant::query();

    // Search by name/email
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('fname', 'like', '%' . $request->search . '%')
              ->orWhere('lname', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    // Filter by sex
    if ($request->filled('sex')) {
        $query->where('sex', $request->sex);
    }

    // Sort by birthday
    if ($request->filled('sort_birthday')) {
        $query->orderBy('birthday', $request->sort_birthday);
    }

    $applicants = $query->latest()->paginate(15)->appends($request->all());

    return view('client.applicants.index', compact('applicants'));
}



    public function create()
    {
        return view('client.applicants.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:applicants',
            'sex' => 'nullable|in:Male,Female',
            'birthday' => 'nullable|date',
            'contact' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
        
        $applicant = Applicant::create($request->all());
        AuditLogger::log('create', 'Applicant', $applicant->id, $request->all());



        return redirect()->route('client.applicants.index')->with('success', 'Applicant created successfully.');
    }

    public function show(Applicant $applicant)
    {
        $applicant->load(['educations', 'workExperiences', 'medicals', 'finances']);
        return view('client.applicants.show', compact('applicant'));
    }


    public function edit(Applicant $applicant)
    {
        return view('client.applicants.edit', compact('applicant'));
    }

    public function update(Request $request, Applicant $applicant)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:applicants,email,' . $applicant->id,
            'sex' => 'nullable|in:Male,Female',
            'birthday' => 'nullable|date',
            'contact' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $applicant->update($request->all());
        $old = $applicant->toArray();
        $applicant->update($request->all());

        $changes = [
            'before' => $old,
            'after' => $applicant->fresh()->toArray(),
        ];

        AuditLogger::log('update', 'Applicant', $applicant->id, $changes);


        return redirect()->route('client.applicants.index')->with('success', 'Applicant updated successfully.');
    }

    public function destroy(Applicant $applicant)
    {
        AuditLogger::log('delete', 'Applicant', $applicant->id, $applicant->toArray());
        $applicant->delete();
        return redirect()->route('client.applicants.index')->with('success', 'Applicant deleted.');
    }
}
