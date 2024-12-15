<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galeries';
    protected $keyType = 'string';
    protected $fillable = ['image', 'company_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($galery) {
            if (!$galery->id) {
                $galery->id = (string) Str::uuid();
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
