<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:250'],
            'nip' => ['required', 'numeric', 'min:3'],
            'satuan_kerja_eselon_3' => ['required', 'string', 'min:3', 'max:250'],
            'satuan_kerja_eselon_2' => ['required', 'string', 'min:3', 'max:250'],
            'satuan_kerja_eselon_1' => ['required', 'string', 'min:3', 'max:250'],
            'roles' => ['required', 'array'],
            'roles.*' => ['exists:roles,id'],
            'nama_jabatan' => ['required', 'string', 'min:3', 'max:250'],
            'fungsi' => ['required', 'string', 'min:3', 'max:250'],
            'email' => ['required','email', 'min:3', 'max:250'],
            'password' => ['required'],
            
        ];
    }
}
