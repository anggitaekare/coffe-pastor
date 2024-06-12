<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_produk' => ['required', 'max:100'],
            'kategori_produk' => ['required', 'numeric', 'min:1'],
            'harga_produk' => ['required', 'numeric', 'min:0'],
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
