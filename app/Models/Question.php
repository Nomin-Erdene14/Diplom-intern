<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\category;
use App\Models\option;
use App\Models\result;

class Question extends Model
{
    use HasFactory;

   

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
      
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
   
        // 'category_id',
        'question_text',
    ];

    public function questionOptions()
    {
        return $this->hasMany(Option::class, 'question_id', 'id');
    }

    public function questionsResults()
    {
        return $this->belongsToMany(Result::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
    public function result()
    {
        return $this->belongsToMany(Result::class);
    }
}
