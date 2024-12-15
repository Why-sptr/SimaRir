<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $keyType = 'string';
    protected $fillable = ['user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($admin) {
            if (!$admin->id) {
                $admin->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
