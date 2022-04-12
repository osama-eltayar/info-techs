<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required' ],
            'email' => ['required', 'email', 'unique:users,email,' . optional($this->user)->id ],
            'password' => [] + ($this->isMethod('POST') ? ['required','min:6','confirmed' ] : []) ,
            'role' => ['required','exists:roles,name']
        ];
    }
}
