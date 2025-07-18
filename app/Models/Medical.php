<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'exam_date',
        'clinic_name',
        'findings',
        'status',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
