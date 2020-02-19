<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiUpdateRequest extends FormRequest
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
            'nama'          => 'required|min:3',
            'email'         => 'required|min:3|email|unique:users,email,'.$this->user()->id,
            'password'      => 'confirmed',
            'jabatan_id'    => 'required',
            'departemen_id' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'              => ':attribute wajib diisi.',
            'jabatan_id.required'   => 'jabatan wajib dipilih.',
            'departemen_id.required'=> 'departemen wajib dipilih.',
            'confirmed'             => ':attribute tidak cocok!.',
            'email'                 => ':attribute tidak sesuai.',
            'min'                   => ':attribute minimal 3 karakter.',
            'unique'                => ':attribute sudah digunakan.'
        ];
    }
}
