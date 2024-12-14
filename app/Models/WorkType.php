<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WorkType extends Model
{
    use HasFactory;
    protected $table = 'work_types';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($education) {
            if (!$education->id) {
                $education->id = (string) Str::uuid();
            }
        });
    }

    public function jobWorks()
    {
        return $this->hasMany(JobWork::class);
    }
}
