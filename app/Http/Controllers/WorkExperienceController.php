<?php

namespace App\Http\Controllers;

use App\Helpers\AuditLogger;
use App\Models\WorkExperience;
use App\Models\Applicant;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index(Request $request)
{
    $query = \App\Models\WorkExperience::with('applicant');

    // Search by applicant name
    if ($request->filled('search')) {
        $query->whereHas('applicant', function ($q) use ($request) {
            $q->where('fname', 'like', '%' . $request->search . '%')
              ->orWhere('lname', 'like', '%' . $request->search . '%');
        });
    }

    // Filter by position
    if ($request->filled('position')) {
        $query->where('position', 'like', '%' . $request->position . '%');
    }

    $experiences = $query->latest()->paginate(15)->appends($request->all());

    return view('client.work_experiences.index', compact('experiences'));
}



    public function create()
    {
        $applicants = Applicant::all();
        return view('client.work_experiences.create', compact('applicants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'company_name' => 'required',
            'position' => 'required',
            'duration' => 'nullable',
            'description' => 'nullable',
        ]);

        $work_experience = WorkExperience::create($request->all());
        AuditLogger::log('create', 'WorkExperience', $work_experience->id, $request->all());

        return redirect()->route('client.work_experiences.index')->with('success', 'Work experience added.');
    }

    public function edit(WorkExperience $work_experience)
    {
        $applicants = Applicant::all();
        return view('client.work_experiences.edit', compact('work_experience', 'applicants'));
    }

    public function update(Request $request, WorkExperience $work_experience)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'company_name' => 'required',
            'position' => 'required',
            'duration' => 'nullable',
            'description' => 'nullable',
        ]);

        $work_experience->update($request->all());

        return redirect()->route('client.work_experiences.index')->with('success', 'Work experience updated.');
    }

    public function destroy(WorkExperience $work_experience)
    {
        $work_experience->delete();
        return redirect()->route('client.work_experiences.index')->with('success', 'Deleted.');
    }
}
