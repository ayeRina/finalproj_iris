<?php

namespace App\Http\Controllers;

use App\Helpers\AuditLogger;
use App\Models\Finance;
use App\Models\Applicant;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Finance::with('applicant');

        if ($request->filled('purpose')) {
            $query->where('purpose', 'like', '%' . $request->purpose . '%');
        }

        if ($request->filled('applicant_name')) {
            $query->whereHas('applicant', function ($q) use ($request) {
                $q->where('fname', 'like', '%' . $request->applicant_name . '%')
                ->orWhere('lname', 'like', '%' . $request->applicant_name . '%');
            });
        }

        $finances = $query->latest()->paginate(15);

        return view('client.finances.index', compact('finances'));
    }

    public function create()
    {
        $applicants = Applicant::all();
        return view('client.finances.create', compact('applicants'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'amount' => 'required|numeric|min:0',
            'paid_at' => 'required|date',
            'purpose' => 'required|string',
        ]);

        $finance = Finance::create($request->all());
        AuditLogger::log('create', 'Finance', $finance->id, $request->all());

        return redirect()->route('client.finances.index')->with('success', 'Finance record added successfully.');
    }

    public function edit(Finance $finance)
    {
        $applicants = Applicant::all();
        return view('client.finances.edit', compact('finance', 'applicants'));
    }

    public function update(Request $request, Finance $finance)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'amount' => 'required|numeric|min:0',
            'paid_at' => 'required|date',
            'purpose' => 'required|string',
        ]);

        $finance->update($request->all());
        $old = $finance->toArray();
        $finance->update($request->all());

        $changes = [
            'before' => $old,
            'after' => $finance->fresh()->toArray(),
        ];

        AuditLogger::log('update', 'Finance', $finance->id, $changes);


        return redirect()->route('client.finances.index')->with('success', 'Finance record updated successfully.');
    }

    public function destroy(Finance $finance)
    {
        AuditLogger::log('delete', 'Finance', $finance->id, $finance->toArray());
        $finance->delete();
        return redirect()->route('client.finances.index')->with('success', 'Finance record deleted.');
    }
}
