<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WorkMethod extends Model
{
    use HasFactory;
    protected $table = 'work_methods';
    protected $keyType = 'string';
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($workMethod) {
            if (!$workMethod->id) {
                $workMethod->id = (string) Str::uuid();
            }
        });
    }

    public function jobWorks()
    {
        return $this->hasMany(JobWork::class);
    }
}
