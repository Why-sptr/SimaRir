<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'skills';
    protected $keyType = 'string';
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($skill) {
            if (!$skill->id) {
                $skill->id = (string) Str::uuid();
            }
        });
    }

    public function skillJobs()
    {
        return $this->hasMany(SkillJob::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'skill_user', 'skill_id', 'user_id')->withTimestamps();
    }
}
