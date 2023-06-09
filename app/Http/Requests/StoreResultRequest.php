<?php

namespace App\Http\Requests;

use App\Models\Result;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreResultRequest extends FormRequest
{
    public function authorize()
    {
        

        return true;
    }

    public function rules()
    {
        return [
            'user_id'      => [
                'required',
                'integer',
            ],
            'total_points' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'questions.*'  => [
                'integer',
            ],
            'questions'    => [
                'array',
            ],
        ];
    }
}