<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WorkTime extends Model
{
    use HasFactory;
    protected $table = 'work_times';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'company_id', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($education) {
            if (!$education->id) {
                $education->id = (string) Str::uuid();
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
