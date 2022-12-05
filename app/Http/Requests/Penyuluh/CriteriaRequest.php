<?php

namespace App\Http\Requests\Penyuluh;

use Illuminate\Foundation\Http\FormRequest;

class CriteriaRequest extends FormRequest
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
            'name' => 'required',
            'as' => 'required',
            'value' => 'required',
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
            'name.required' => 'Nama Kriteria tidak boleh kosong',
            'as.required' => 'Alias Kriteria tidak boleh kosong',
            'value.required' => 'Nilai Kriteria tidak boleh kosong',
        ];
    }
}
