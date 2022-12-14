<?php

namespace App\Http\Requests\Penyuluh;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|max:255',
            'nik' => 'required|integer|min:16',
            'no_hp' => 'required|integer|min:10',
            'alamat' => 'required',
            'village' => 'required',
            'role' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama terlalu panjang',
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.integer' => 'NIK Harus angka',
            'nik.min' => 'NIK minimal 16 digit',
            'no_hp.required' => 'Nomor Handphone tidak boleh kosong',
            'no_hp.integer' => 'Nomor Handphone Harus angka',
            'no_hp.min' => 'Nomor Handphone minimal 10 digit',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'village.required' => 'Desa tidak boleh kosong',
            'role.required' => 'Peran tidak boleh kosong',
        ];
    }
}
