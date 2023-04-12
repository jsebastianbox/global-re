<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReinsurerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        //|alpha solo letras sin campos vacios
        return [
            'name'=>'required|max:255',
            'contact'=>'required|max:255',
            'email'=>'required|unique:users',
            'phone_one'=>'required|alpha_num',
        ];
    }
}
