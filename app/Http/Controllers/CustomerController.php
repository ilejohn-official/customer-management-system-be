<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\StoreCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a a paginated list of customers with search and filtering.
     */
    public function index(Request $request): JsonResponse
    {
        $searchText = $request->query('search_text');
        $pageSize = $request->query('page_size', 5);
        
        $customers = Customer::when($searchText, function ($query, $searchText) {
            return $query->where('firstname', 'like', "%$searchText%")
                ->orWhere('lastname', 'like', "%$searchText%")
                ->orWhere('email', 'like', "%$searchText%");
        })->paginate($pageSize);

        return response()->json([
            'message' => 'Customers retrieved successfully.',
            'data' => CustomerResource::collection($customers)
        ]);
    }

    /**
     * Store a newly created customer.
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $customer = Customer::create($request->validated());
        
        return response()->json([
            'message' => 'Customer created successfully.',
            'data' => new CustomerResource($customer),
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }
}
