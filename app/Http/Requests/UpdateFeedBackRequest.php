<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedBackRequest extends FormRequest
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
            'name' => 'sometimes|alpha_num|max:14',
            'phone' => 'sometimes|numeric',
            'email' => 'sometimes|email',
            'subject' => 'sometimes|max:100',
            'body' => 'sometimes|max:500',
        ];
    }
}
