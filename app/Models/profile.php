<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['user_id', 'dob','gender','address','phone_number','gender','dob','school','experience','bio','GPA'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function job()
    {
        return $this->hasMany(Job::class);
    }
}


