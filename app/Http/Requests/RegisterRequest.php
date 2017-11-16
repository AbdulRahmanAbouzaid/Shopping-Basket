<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class RegisterRequest extends FormRequest
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
            'name' => 'required',

            'password' => 'required|confirmed'
        ];
    }


    public function register()
    {

        $user = new User([

                'name' => $this->get('name'),

                'password' => \Hash::make($this->get('password')),

                'is_admin' => false

                ]);

            $user->save();

            auth()->login($user);
            
    }
}
