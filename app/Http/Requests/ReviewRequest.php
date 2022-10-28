<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'rating' => 'required',
            'review.body' => 'nullable|string|max:100',
        ];
    }
}
