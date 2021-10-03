<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocRequest extends FormRequest
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
        return [
            // 'photo' => 'mimes:jpg,jpeg,bmp,png',
            'name' => 'required|max:255',
            'phone' => 'required|min:7',
            'specialization_id' => 'integer',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
