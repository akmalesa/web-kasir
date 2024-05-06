<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStokRequest extends FormRequest
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
            'menu_id'       => 'required',
            'jumlah'      => 'required'
        ];
    }


    public function messages()
    {
        return [
            'menu_id.required' => 'Id menu belum di tambahkan!!',
            'jumlah.required'  => 'Jumlah nya belum diisi!!'
        ];
    }
}
