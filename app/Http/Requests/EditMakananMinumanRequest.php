<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMakananMinumanRequest extends FormRequest
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
            'nama_makanan_minuman' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama_makanan_minuman.required' => 'Nama Makanan atau Minuman tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'stok.required' => 'Jumlah Stok tidak boleh kosong',
        ];
    }
}
