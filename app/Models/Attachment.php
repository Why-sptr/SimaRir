<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;
    protected $table = 'attachments';
    protected $fillable = ['cv', 'portfolio'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
