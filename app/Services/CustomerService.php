<?php

namespace App\Services;

use App\Models\Customer;
use App\Http\Resources\CustomerResource;

class CustomerService
{
    /**
     * Filter customers based on search criteria.
     */
    public function filterCustomers(?string $searchText)
    {
        return Customer::when($searchText, function ($query, $searchText) {
            return $query->where('firstname', 'like', "%$searchText%")
                ->orWhere('lastname', 'like', "%$searchText%")
                ->orWhere('email', 'like', "%$searchText%");
        });
    }

    /**
     * Create a new customer.
     */
    public function createCustomer(array $validatedData)
    {
        return Customer::create($validatedData);
    }

    /**
     * Update an existing customer.
     */
    public function updateCustomer(Customer $customer, array $validatedData)
    {
        $customer->update($validatedData);
        
        return $customer;
    }
}
