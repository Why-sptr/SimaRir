<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SkillJob extends Model
{
    use HasFactory;
    protected $table = 'skill_jobs';
    protected $keyType = 'string';
    protected $fillable = ['skill_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($skillJob) {
            if (!$skillJob->id) {
                $skillJob->id = (string) Str::uuid();
            }
        });
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function jobWorks()
    {
        return $this->hasMany(JobWork::class);
    }
}
