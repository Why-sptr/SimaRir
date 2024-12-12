<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillJob extends Model
{
    use HasFactory;
    protected $table = 'skill_jobs';
    protected $fillable = ['skill_id'];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function jobWorks()
    {
        return $this->hasMany(JobWork::class);
    }
}
