<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';
    protected $keyType = 'string';
    protected $fillable = ['job_id', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bookmark) {
            if (!$bookmark->id) {
                $bookmark->id = (string) Str::uuid();
            }
        });
    }

    public function jobWork()
    {
        return $this->belongsTo(JobWork::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
