<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        'user', 
        'action', 
        'model', 
        'record_id', 
        'details'
    ];
}
