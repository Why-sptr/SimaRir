<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'organizations';
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'name', 'department', 'description'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($organization) {
            if (!$organization->id) {
                $organization->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
