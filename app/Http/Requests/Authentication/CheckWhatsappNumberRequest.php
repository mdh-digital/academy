<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class CheckWhatsappNumberRequest extends FormRequest
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
            'name'              => 'required',
            'phone'             => 'required|numeric|unique:users,phone,NULL,id,deleted_at,NULL',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama Lengkap Harus di Isi',
            'phone.required'    => 'Nomor whatsapp harus di isi',
            'phone.numeric'     => 'Nomor Whatsapp Harus Berupa Angka',
            'phone.unique'      => 'Nomor ini telah ada yang menggunakan sebelumnya',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'message'   => $validator->errors()->first(),
            'status'    => false
        ], 200);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
