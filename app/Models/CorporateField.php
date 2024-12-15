<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CorporateField extends Model
{
    use HasFactory;
    protected $table = 'corporate_fields';
    protected $keyType = 'string';
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($corporateField) {
            if (!$corporateField->id) {
                $corporateField->id = (string) Str::uuid();
            }
        });
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
