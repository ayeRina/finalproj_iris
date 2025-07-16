<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'job_opening_id',
        'status',
        'remarks',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function jobOpening()
    {
        return $this->belongsTo(JobOpening::class);
    }
}
