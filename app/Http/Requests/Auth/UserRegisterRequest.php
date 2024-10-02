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
            'id_satuan_kerja_eselon_1' => ['numeric'],
            'id_satuan_kerja_eselon_2' => ['numeric'],
            'id_satuan_kerja_eselon_3' => ['numeric'],
            'roles' => ['required', 'array'],
            'roles.*' => ['exists:roles,id'],
            'nama_jabatan' => ['required', 'string', 'min:3', 'max:250'],
            'id_fungsi' => ['numeric'],
            'email' => ['required','email', 'min:3', 'max:250'],
            'password' => ['required'],
            'bidang_keahlian' => ['required', 'string', 'min:3', 'max:250'],
            'bidang_pendidikan' => ['required', 'string', 'min:3', 'max:250'],
            'image_profile' => ['required','array'],
            'image_profile.*' => ['mimes:jpg,png,jpeg,gif,svg,pdf','max:2048'],
        ];
    }
}
