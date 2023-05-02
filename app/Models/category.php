<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\Question;

class category extends Model
{
    public $table = 'categories';

    protected $dates = [
        'id',
        'created_at',
        'updated_at',
        
    ];

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        
    ];
    public function jobs(){
        return $this->hasMany(Job::class);
    }
    // public function categoryQuestions()
    // {
    //     return $this->hasMany(Question::class, 'category_id' ,'id');
    // }
    
}

