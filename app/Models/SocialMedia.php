<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SocialMedia extends Model
{
    use HasFactory;
    protected $table = 'social_media';
    protected $keyType = 'string';
    protected $fillable = ['instagram', 'github', 'youtube', 'website', 'linkedin', 'tiktok'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($education) {
            if (!$education->id) {
                $education->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

