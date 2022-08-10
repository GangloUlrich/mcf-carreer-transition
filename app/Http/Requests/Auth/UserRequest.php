<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'birthdate' => ['required','date','date_format:Y-m-d', 'before:'.now()->subYears(17)->toDateString()],
            'secteur' => ['required','not_in:0'],
            'ecole' => ['required'],
            'filiere' => ['required'],
            'phone' => ['required'],
            'resume' => ['required','mimes:pdf', 'max:3000'],
            'sexe' => ['required'],
            'cohorte' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->uncompromised()],
            'password_confirmation' => ['required']
        ];
    }

    public function attributes()
    {
        return [

            'lastname' => 'nom',
            'firstname' => 'prénom',
            'birthdate' => 'date de naissance',
            'phone' => 'téléphone',
            'resume' => 'curriculum vitae',
            'password' => 'mot de passe',
            'password_confirmation' => 'confirmation du mot de passe',
            'filiere' => 'filière',
            'ecole' => 'université',
             ];
    }
}
