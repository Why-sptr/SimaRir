<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';
    protected $fillable = ['job_id', 'user_id'];

    public function job()
    {
        return $this->belongsTo(JobWork::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
