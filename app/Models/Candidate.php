<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidates';
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'job_id', 'status', 'cv'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($candidate) {
            if (!$candidate->id) {
                $candidate->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Pada model Candidate
    public function jobWork()
    {
        return $this->belongsTo(JobWork::class, 'job_id');
    }
}
