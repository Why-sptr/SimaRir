<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certification extends Model
{
    use HasFactory;
    protected $table = 'certifications';
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'name', 'publisher', 'start_date', 'end_date'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($certification) {
            if (!$certification->id) {
                $certification->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
