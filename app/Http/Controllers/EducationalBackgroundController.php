<?php

namespace App\Http\Controllers;

use App\Helpers\AuditLogger;
use App\Models\EducationalBackground;
use App\Models\Applicant;
use Illuminate\Http\Request;

class EducationalBackgroundController extends Controller
{
   public function index(Request $request)
{
    $query = \App\Models\EducationalBackground::with('applicant');

    // Filter by applicant name
    if ($request->filled('search')) {
        $query->whereHas('applicant', function ($q) use ($request) {
            $q->where('fname', 'like', '%' . $request->search . '%')
              ->orWhere('lname', 'like', '%' . $request->search . '%');
        });
    }

    // Filter by level
    if ($request->filled('level')) {
        $query->where('level', 'like', '%' . $request->level . '%');
    }

    // Filter by year graduated
    if ($request->filled('year')) {
        $query->where('year_graduated', $request->year);
    }

    $educations = $query->latest()->paginate(15)->appends($request->all());

    return view('client.educations.index', compact('educations'));
}

    public function create()
    {
        $applicants = Applicant::all();
        return view('client.educations.create', compact('applicants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'school_name' => 'required|string',
            'level' => 'required|string',
            'course' => 'nullable|string',
            'year_graduated' => 'nullable|digits:4',
        ]);

        $education = EducationalBackground::create($request->all());
        AuditLogger::log('create', 'EducationalBackground', $education->id, $request->all());

        return redirect()->route('client.educations.index')->with('success', 'Education added successfully.');
    }


    public function edit(EducationalBackground $education)
    {
        $applicants = Applicant::all();
        return view('client.educations.edit', compact('education', 'applicants'));
    }

    public function update(Request $request, EducationalBackground $education)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'school_name' => 'required|string',
            'level' => 'required|string',
            'course' => 'nullable|string',
            'year_graduated' => 'nullable|digits:4',
        ]);

        $education->update($request->all());
        $old = $education->toArray();
        $education->update($request->all());

        $changes = [
            'before' => $old,
            'after' => $education->fresh()->toArray(),
        ];

        AuditLogger::log('update', 'edi$education', $education->id, $changes);


        return redirect()->route('client.educations.index')->with('success', 'Education updated successfully.');
    }

    public function destroy(EducationalBackground $education)
    {
        AuditLogger::log('delete', 'EducationalBackground', $education->id, $education->toArray());
        $education->delete();
        return redirect()->route('client.educations.index')->with('success', 'Education deleted.');
    }
}
