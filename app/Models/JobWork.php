<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobWork extends Model
{
    use HasFactory;
    protected $table = 'job_works';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'name',
        'salary',
        'description',
        'location',
        'start_date',
        'end_date',
        'company_id',
        'work_type_id',
        'work_method_id',
        'job_role_id',
        'qualification_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jobWork) {
            if (!$jobWork->id) {
                $jobWork->id = (string) Str::uuid();
            }
        });
    }

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
        return $this->hasMany(Candidate::class, 'job_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'job_id');
    }

    public function skillJobs()
    {
        return $this->hasMany(SkillJob::class, 'job_id');
    }

}
