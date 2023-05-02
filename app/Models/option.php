<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class option extends Model
{
    use HasFactory;

    

    public $table = 'options';

    protected $dates = [
        'created_at',
        'updated_at',
        
    ];

    protected $fillable = [
        'points',
        'created_at',
        'updated_at',
        
        'question_id',
        'option_text',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

}
