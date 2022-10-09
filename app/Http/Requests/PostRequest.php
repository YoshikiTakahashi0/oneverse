<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'music' => 'required|mimes:mp4,qt',
            'post.title' => 'required|string|max:50',
            'post.body' => 'required|string|max:300',
        ];
    }
}
