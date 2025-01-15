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
    public $incrementing = false;
    protected $fillable = ['work_experience', 'education_id', 'major', 'ipk', 'toefl'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function jobWork()
    {
        return $this->hasOne(JobWork::class);
    }
}
