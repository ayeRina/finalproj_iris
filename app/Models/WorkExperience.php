<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'company_name',
        'position',
        'duration',
        'description',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
