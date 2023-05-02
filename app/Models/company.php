<?php

namespace App\Models;
use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class company extends Model 

{
    use HasFactory;
    protected $fillable = ['user_id','cname','slug','address','phone',
    'website','logo', 'cover_photo', 'slogan','description'];
    public function getRouteKeyName()
    {
        return'slug';
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
