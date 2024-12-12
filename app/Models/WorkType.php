<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    use HasFactory;
    protected $table = 'work_types';
    protected $fillable = ['name'];

    public function jobWorks()
    {
        return $this->hasMany(JobWork::class);
    }
}
