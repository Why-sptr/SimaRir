<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SocialMedia extends Model
{
    use HasFactory;
    protected $table = 'social_media';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['instagram', 'github', 'youtube', 'website', 'linkedin', 'tiktok'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($socialMedia) {
            if (!$socialMedia->id) {
                $socialMedia->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'social_media_id');
    }
}
