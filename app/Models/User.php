<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use App\Models\Company;
use App\Models\Report;
use App\Models\Result;
use App\Models\Role;
use Illuminate\Pagination\Paginator;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function users()
    {
      return $this->belongsToMany(User::class);
    }
    public function favourite()
    {
        return $this->belongsToMany(Job::class, 'favourites', 'user_id', 'job_id');
    }
    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
    public function job()
    {
        return $this->hasMany(Job::class);
    }
    public function userResults()
    {
        return $this->hasMany(Result::class, 'user_id', 'id','total_points');
    }
}