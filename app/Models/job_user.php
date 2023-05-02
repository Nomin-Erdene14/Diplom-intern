<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
class job_user extends Model
{
    use HasFactory;
    protected $fillable = ['job_id', 'user_id','created_at','updated_at'];
    public function job()
    {
        return $this->hasMany(Report::class);
    }
}
