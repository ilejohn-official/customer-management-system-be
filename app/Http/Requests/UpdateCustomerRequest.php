<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'firstname' => 'sometimes|string|max:255',
            'lastname' => 'sometimes|string|max:255',
            'telephone' => 'sometimes|string|unique:customers,telephone,' . $this->customer->id,
            'bvn' => 'sometimes|string|unique:customers,bvn,' . $this->customer->id,
            'dob' => 'sometimes|date',
            'residential_address' => 'sometimes|string',
            'state' => 'sometimes|string|max:255',
            'bankcode' => 'sometimes|string|max:10',
            'accountnumber' => 'sometimes|string|unique:customers,accountnumber,' . $this->customer->id,
            'company_id' => 'sometimes|exists:companies,id',
            'email' => 'sometimes|email|max:255|unique:customers,email,' . $this->customer->id,
            'city' => 'sometimes|string|max:255',
            'country' => 'sometimes|string|max:255',
            'id_card' => 'nullable|string',
            'voters_card' => 'nullable|string',
            'drivers_licence' => 'nullable|string',
        ];
    }
}
