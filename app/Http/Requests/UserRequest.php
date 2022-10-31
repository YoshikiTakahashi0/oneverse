<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            //'name' => 'required|string|max:255',
            //'gender' => 'required',
            //'age' => 'required|integer',
            //'email' => 'required|string|email',
            //'password' => 'required|string|min:8|confirmed',
            //'image' => 'nullable|image'
        ];
    }
}
