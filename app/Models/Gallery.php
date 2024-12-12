<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galeries';
    protected $fillable = ['image', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
