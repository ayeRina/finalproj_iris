<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;


class AuditLogController extends Controller
{
    public function index(Request $request)
{
    $query = AuditLog::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('user', 'like', '%' . $request->search . '%')
              ->orWhere('model', 'like', '%' . $request->search . '%')
              ->orWhere('record_id', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('action')) {
        $query->where('action', $request->action);
    }

    if ($request->filled('model')) {
        $query->where('model', $request->model);
    }

    $logs = $query->latest()->paginate(15);

    // Distinct values for dropdowns
    $models = AuditLog::select('model')->distinct()->pluck('model');
    $actions = AuditLog::select('action')->distinct()->pluck('action');

    return view('client.audit_logs.index', compact('logs', 'models', 'actions'));
}

}

