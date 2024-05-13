<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRestoRequest extends FormRequest
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
            'nama_restoran' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'nama_pemilik' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nama_restoran.required' => 'Nama Restoran tidak boleh kosong',
            'nama_restoran.string'=>'Nama Restoran harus text',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string'=>'Alamat harus text',
            'no_telp.required' => 'Nomor Telepon tidak boleh kosong',
            'no_telp.numeric'=>'Nomor Telepon harus angka',
            'nama_pemilik.required' => 'Nama Pemilik tidak boleh kosong',
            'nama_pemilik.string'=> 'Nama Pemilik harus text',
        ];
    }
}
