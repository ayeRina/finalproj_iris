<?php

namespace App\Helpers;

use App\Models\AuditLog;

class AuditLogger
{
    public static function log($action, $model, $recordId, $details = null)
    {
        AuditLog::create([
            'user' => auth()->check() ? auth()->user()->name : 'System',
            'action' => $action,
            'model' => $model,
            'record_id' => $recordId,
            'details' => is_array($details) ? json_encode($details) : $details,
        ]);
    }
}
