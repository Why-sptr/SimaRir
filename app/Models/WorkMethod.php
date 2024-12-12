<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkMethod extends Model
{
    use HasFactory;
    protected $table = 'work_methods';
    protected $fillable = ['name'];

    public function jobWorks()
    {
        return $this->hasMany(JobWork::class);
    }
}
