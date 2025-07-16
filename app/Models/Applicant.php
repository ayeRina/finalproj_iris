<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'sex',
        'birthday',
        'contact',
        'address',
    ];


    public function educationalBackgrounds()
    {
        return $this->hasMany(EducationalBackground::class);
    }

    public function educations()
    {
        return $this->hasMany(EducationalBackground::class);
    }


    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }


    public function medicals()
    {
        return $this->hasMany(Medical::class);
    }


        public function finances()
    {
        return $this->hasMany(Finance::class);
    }
}
