<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerInformationStoreRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  */
    // public function authorize(): bool
    // {
    //     // ini harus di rubah dari false jadi true
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // untuk kita melakukan validasi data tersebut harus seperti apa
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'duration' => 'required',
            // strart date dia diambil dari cus-info.js inputannya
            'start_date' => 'required'

        ];
    }
}
