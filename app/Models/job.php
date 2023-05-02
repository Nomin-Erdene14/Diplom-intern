<?php

namespace App\Models;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Report;
use App\Models\job_user;

class job extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'company_id',
    'category_id',
    'title',
    'slug',
    'description',
    'role',
    'tehnology',
    'position',
    'address',
    'salary',
    'time',
    'type',
    'status',
    'last_date'
];
    public function getRouteKeyName()
    {
        return'slug';
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function users()
    {
      return $this->belongsToMany(User::class);
    }
    public function checkApplication()
    {
        return DB::table('job_user')->where('user_id',auth()->user()->id)
        ->where('job_id',$this->id)->exists();
    }
    public function favourite()
    {
      return $this->belongsToMany(User::class,'favourites','job_id','user_id');
    }
    public function checkSaved()
    {
        return DB::table('favourites')->where('user_id',auth()->user()->id)
        ->where('job_id',$this->id)->exists();
    }
    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function job_user()
    {
        return $this->hasMany(Report::class);
    }
    public function category()
    {
        return $this->hasMany(Category::class);
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class,'user_id');
    }
    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
