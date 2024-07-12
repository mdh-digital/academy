<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class WhatsappVerificationRequest extends FormRequest
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
            'phone'             => 'required|numeric|unique:users,phone,NULL,id,deleted_at,NULL',
            'code'              => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.required'    => 'Nomor whatsapp harus di isi',
            'phone.numeric'     => 'Nomor Whatsapp Harus Berupa Angka',
            'phone.unique'      => 'Nomor ini telah ada yang menggunakan sebelumnya',
            'code.required'     => 'Kode Verifikasi Wajib Di isi'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'status'    => false,
            'message'   => $validator->errors()->first(),
        ], 200);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
