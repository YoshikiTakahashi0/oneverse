<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'user.name' => 'string|max:20',
            'user.body' => 'nullable|string|max:160',
            'user.email' => 'string|email',
        ];
    }
}
