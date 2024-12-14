<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Qualification extends Model
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $keyType = 'string';
    protected $fillable = ['work_experience', 'education_id', 'major', 'ipk', 'toefl'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($education) {
            if (!$education->id) {
                $education->id = (string) Str::uuid();
            }
        });
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}

