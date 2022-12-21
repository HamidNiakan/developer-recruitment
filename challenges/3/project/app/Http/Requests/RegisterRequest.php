<?php

namespace App\Http\Requests;

use App\Rules\ValidMobile;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'cellphone' => ['required', new ValidMobile(),'unique:users,cellphone'],
            'name' => ['required','string','max:255'],
            'lastname' => ['required'],
            'password' => ['required', 'min:6'],
        ];
    }
}
