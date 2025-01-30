<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'telephone' => $this->telephone,
            'bvn' => $this->bvn,
            'dob' => $this->dob,
            'residential_address' => $this->residential_address,
            'state' => $this->state,
            'bankcode' => $this->bankcode,
            'accountnumber' => $this->accountnumber,
            'company_id' => $this->company_id,
            'email' => $this->email,
            'city' => $this->city,
            'country' => $this->country,
            'id_card' => $this->id_card,
            'voters_card' => $this->voters_card,
            'drivers_licence' => $this->drivers_licence,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
