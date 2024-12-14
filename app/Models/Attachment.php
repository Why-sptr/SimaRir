<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Attachment extends Model
{
    use HasFactory;
    protected $table = 'attachments';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['cv', 'portfolio'];

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
