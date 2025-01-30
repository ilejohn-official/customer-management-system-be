<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    use ApiResponse;

    /**
     * Inject the CustomerService into the controller.
     */
    public function __construct(protected CustomerService $customerService) {}

    /**
     * Display a a paginated list of customers with search and filtering.
     */
    public function index(Request $request): JsonResponse
    {
        $searchText = $request->query('search_text');
        $pageSize = $request->query('page_size', 5);

        $customers = $this->customerService->filterCustomers($searchText)->paginate($pageSize);

        $transformedData = CustomerResource::collection($customers)->toArray($request);

        return $this->successResponse(array_merge($customers->toArray(), ['data' => $transformedData]), 'Customers retrieved successfully.');
    }

    /**
     * Store a newly created customer.
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $customer = $this->customerService->createCustomer($request->validated());

        return $this->successResponse(new CustomerResource($customer), 'Customer created successfully.', 201);
    }

    /**
     * Update the specified customer.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): JsonResponse
    {
        $updatedCustomer = $this->customerService->updateCustomer($customer, $request->validated());

        return $this->successResponse(new CustomerResource($updatedCustomer), 'Customer updated successfully.');
    }
}
