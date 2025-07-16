<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    use HasFactory;

    protected $table = 'educational_backgrounds';

    protected $fillable = [
        'applicant_id',
        'school_name',
        'level',
        'course',
        'year_graduated',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
