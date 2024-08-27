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
            'id_satuan_kerja_eselon_1' => ['required', 'numeric'],
            'id_satuan_kerja_eselon_2' => ['required', 'numeric'],
            'id_satuan_kerja_eselon_3' => ['required', 'numeric'],
            'roles' => ['required', 'array'],
            'roles.*' => ['exists:roles,id'],
            'nama_jabatan' => ['required', 'string', 'min:3', 'max:250'],
            'id_fungsi' => ['required', 'numeric'],
            'email' => ['required','email', 'min:3', 'max:250'],
            'password' => ['required'],
            
        ];
    }
}
