<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduktRequest extends FormRequest
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
            'nama_produk'  => 'required',
            'nama_suplier' => 'required',
            'harga_beli'   => 'required',
            'harga_jual'   => 'required',
            'stok'         => 'required',
            'keterangan'   => 'required'
        ];
    }

    public function messages()
    {
        return[
            'nama_produk.required'  => 'Nama Produk belum diisi!',
            'nama_suplier.required' => 'Nama Suplier belum diisi!',
            'harga_beli.required'   => 'Harga Beli belum diisi!!',
            'harga_jual.required'   => 'Harga Jual belum diisii!!',
            'stok.required'         => 'Stok nya belum diisii!',
            'keterangan.required'   => 'Keterangan wajib diisi!!'
        ];
    }
}
