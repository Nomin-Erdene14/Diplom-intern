<?php

namespace App\Http\Requests;

use App\Models\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
       

        return true;
    }

    public function rules()
    {
        return [
            
            'question_text' => [
                'required',
            ],
        ];
    }
}