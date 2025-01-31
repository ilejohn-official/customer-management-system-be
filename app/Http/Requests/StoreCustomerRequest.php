<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'telephone' => 'required|string|unique:customers,telephone',
            'bvn' => 'required|string|unique:customers,bvn',
            'dob' => 'required|date',
            'residential_address' => 'required|string',
            'state' => 'required|string|max:255',
            'bankcode' => 'required|string|max:10',
            'accountnumber' => 'required|string|unique:customers,accountnumber',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|max:255|unique:customers,email',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'id_card' => 'nullable|string',
            'voters_card' => 'nullable|string',
            'drivers_licence' => 'nullable|string',
        ];
    }
}
