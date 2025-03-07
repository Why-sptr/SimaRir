<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'job_id', 'status', 'cv'];

    // Konstanta Status Kandidat
    public const STATUS_PENDING = 'pending';
    public const STATUS_REVIEW = 'review';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_REJECTED = 'rejected';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($candidate) {
            if (!$candidate->id) {
                $candidate->id = (string) Str::uuid();
            }
            if (!$candidate->status) {
                $candidate->status = self::STATUS_PENDING;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobWork()
    {
        return $this->belongsTo(JobWork::class, 'job_id');
    }

    public static function getAvailableStatuses()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_REVIEW => 'Sedang Direview',
            self::STATUS_ACCEPTED => 'Diterima',
            self::STATUS_REJECTED => 'Ditolak',
        ];
    }
}
