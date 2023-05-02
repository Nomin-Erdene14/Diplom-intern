<?php

namespace App\Http\Requests;

use App\Models\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        

        return true;
    }

    public function rules()
    {
        $rules = Category::all();
        
       
        return  [
            'name' => [
                
                'required',
            ],
        ];
    }
}