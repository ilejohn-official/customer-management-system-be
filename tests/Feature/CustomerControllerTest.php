<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_list_customers()
    {
        Customer::factory()->count(3)->create();

        $response = $this->getJson('/api/customers');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'message',
                     'data' => [
                        'data' => [
                             '*' => $this->customerResource()
                         ],
                         'links', 
                         'total',
                         'per_page'
                         
                     ]
                 ]);
    }

    /** @test */
    public function it_can_create_a_customer()
    {
        $data = [
            "firstname" => "John",
            "lastname" => "Doe",
            "email" => "john.doe@example.com",
            "telephone" => "123456789",
            "bvn" => "12345678901",
            "dob" => "1990-05-10",
            "residential_address" => "123 Street",
            "state" => "Lagos",
            "bankcode" => "XYZ123",
            "accountnumber" => "1234567890",
            "company_id" => 1,
            "city" => "Ikeja",
            "country" => "Nigeria"
        ];

        $response = $this->postJson('/api/customers', $data);

        $response->assertStatus(201)
                ->assertJsonStructure([
                    'message',
                    'data' => $this->customerResource()
                ])
                 ->assertJson([
                     'message' => 'Customer created successfully.',
                     'data' => ['firstname' => 'John', 'lastname' => 'Doe']
                 ]);
    }

    /** @test */
    public function it_validates_required_fields_on_creation()
    {
        $response = $this->postJson('/api/customers', []);

        $response->assertStatus(422)
                 ->assertJsonStructure([
                    'message', 'errors'
                ])
                ->assertJsonValidationErrors(['firstname', 'email']);
    }

    /** @test */
    public function it_can_update_a_customer()
    {
        $customer = Customer::factory()->create();

        $updateData = ["firstname" => "UpdatedName"];

        $response = $this->postJson("/api/customers/{$customer->id}", $updateData);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'message',
                    'data' => $this->customerResource()
                ])
                 ->assertJson([
                     'message' => 'Customer updated successfully.',
                     'data' => ['firstname' => 'UpdatedName']
                 ]);
    }

    private function customerResource(): array
    {
        return [
            'id',
            'firstname',
            'lastname',
            'name',
            'telephone',
            'bvn',
            'dob',
            'residential_address',
            'state',
            'bankcode',
            'accountnumber',
            'company_id',
            'email',
            'city',
            'country',
            'id_card',
            'voters_card',
            'drivers_licence',
            'created_at',
            'updated_at'
        ];
    }
}
