<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'title'=>'required|min:5',
            'description'=>'required',
            'salary'=>'required',
            'time'=>'required',
            'type'=>'required',
            'role'=>'required',
            'position'=>'required',
            'address'=>'required',
            'type'=>'required',
            'status'=>'required',
            'last_date'=>'required',
        ];
    }
}
