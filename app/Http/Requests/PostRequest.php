<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'music' => 'required|mimes:mp4,qt',
            'image' => 'nullable|image',
            'post.title' => 'required|string|max:50',
            'post.body' => 'required|string|max:300',
            'review.body' => 'nullable|string|max:100',
            'review.rating' => 'required',
        ];
    }
}