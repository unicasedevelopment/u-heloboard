<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user = request()->route('user');
        return [
            //
            'name' => 'required',
            'email' => 'required|email:rfcdns|unique:users,email,'.$user->id,
            'username' => 'required|unique:users,username,'.$user->id,
        ];
    }
}