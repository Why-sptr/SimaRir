<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $fillable = ['user_id', 'payload', 'last_activity', 'ip_address', 'user_agent'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
