<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{
    /**
     * Filter customers based on search criteria.
     */
    public function filterCustomers(?string $searchText): Builder|Collection
    {
        return Customer::when($searchText, function ($query, $searchText) {
            return $query->where('firstname', 'like', "%$searchText%")
                ->orWhere('lastname', 'like', "%$searchText%")
                ->orWhere('email', 'like', "%$searchText%");
        })->latest();
    }

    /**
     * Create a new customer.
     */
    public function createCustomer(array $validatedData): Customer
    {
        return Customer::create($validatedData);
    }

    /**
     * Update an existing customer.
     */
    public function updateCustomer(Customer $customer, array $validatedData): Customer
    {
        $customer->update($validatedData);
        
        return $customer;
    }
}
