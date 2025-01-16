<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RecentWorkExperience extends Model
{
    use HasFactory;
    protected $table = 'recent_work_experiences';
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'name', 'jobdesk','description','start_date', 'end_date'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($recentWorkExperience) {
            if (!$recentWorkExperience->id) {
                $recentWorkExperience->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}