<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Primary key
    public $incrementing = false;
    protected $table = 'companies';
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'corporate_field_id', 'employee', 'verification_file', 'status_verification'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($company) {
            if (!$company->id) {
                $company->id = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function corporateField()
    {
        return $this->belongsTo(CorporateField::class);
    }

    public function jobWorks()
    {
        return $this->hasMany(JobWork::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function workTimes()
    {
        return $this->hasOne(WorkTime::class);
    }
}
