<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $fillable = ['work_experience', 'education_id', 'major', 'ipk', 'toefl'];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}

