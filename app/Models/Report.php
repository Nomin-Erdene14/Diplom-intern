<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job;
use App\Models\Category;

class Report extends Model
{
    use HasFactory;
    public function report()
    {
        return $this->hasMany(User::class);
    }
    public function reportCompany()
    {
        return $this->hasMany(Company::class);
    }
    public function reportJob()
    {
        return $this->hasMany(Job::class);
    }
    public function reportCategory()
    {
        return $this->hasMany(Category::class);
    }
    public function reportJobUser()
    {
        return $this->hasMany(Job_user::class);
    }
}
