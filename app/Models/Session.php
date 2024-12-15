<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'sessions';

    // Tentukan kolom yang boleh diisi
    protected $fillable = ['user_id', 'payload', 'last_activity', 'ip_address', 'user_agent'];

    // Tentukan UUID sebagai primary key
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';  // Karena menggunakan UUID

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
