<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobWork extends Model
{
    use HasFactory;
    protected $table = 'job_works';
    protected $fillable = [
        'name', 'salary', 'description', 'location', 'start_date', 'end_date', 
        'company_id', 'work_type_id', 'work_method_id', 'skill_job_id', 'job_role_id', 'qualification_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }

    public function workMethod()
    {
        return $this->belongsTo(WorkMethod::class);
    }

    public function skillJob()
    {
        return $this->belongsTo(SkillJob::class);
    }

    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
