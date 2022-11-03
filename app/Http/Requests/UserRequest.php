<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'user.name' => 'string|max:20',
            'user.email' => 'string|email',
            'image' => 'required|image',
        ];
    }
}
