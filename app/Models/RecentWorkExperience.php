<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentWorkExperience extends Model
{
    use HasFactory;
    protected $table = 'recent_work_experiences';
    protected $fillable = ['user_id', 'name', 'jobdesk', 'start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}