<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'google_id',
        'role',
        'phone',
        'location',
        'date_birth',
        'gender',
        'work_experience',
        'description',
        'moto',
        'education_id',
        'social_media_id',
        'attachment_id',
        'job_role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function createOrUpdateFromGoogle(SocialiteUser $socialiteUser)
    {
        $this->google_id = $socialiteUser->getId();
        $this->name = $socialiteUser->getName();
        $this->email = $socialiteUser->getEmail();
        $this->avatar = $socialiteUser->getAvatar();
        $this->password = bcrypt(Str::random(24)); // Menghasilkan password acak
        $this->save();

        // Assign role, misalnya user baru dapat role 'user'
        $this->assignRole('user');
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function socialMedia()
    {
        return $this->belongsTo(SocialMedia::class);
    }

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }

    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function recentWorkExperiences()
    {
        return $this->hasMany(RecentWorkExperience::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
