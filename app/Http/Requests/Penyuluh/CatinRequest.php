<?php

namespace App\Http\Requests\Penyuluh;

use Illuminate\Foundation\Http\FormRequest;

class CatinRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'nik' => 'required|integer|min:16',
            'no_hp' => 'required|numeric|min:10',
            'age' => 'required|integer',
            'alamat' => 'required',
            'village_id' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'status_id' => 'required',
            ];
        }

        return $rules;
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
            'village_id.required' => 'Desa tidak boleh kosong',
            'status_id.required' => 'Status tidak boleh kosong',
        ];
    }
}
