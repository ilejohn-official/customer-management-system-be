<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'telephone' => $this->faker->unique()->phoneNumber,
            'bvn' => $this->faker->unique()->numerify('###########'), // 11-digit BVN
            'dob' => $this->faker->date('Y-m-d'),
            'residential_address' => $this->faker->address,
            'state' => $this->faker->state,
            'bankcode' => $this->faker->swiftBicNumber,
            'accountnumber' => $this->faker->unique()->bankAccountNumber,
            'company_id' => Company::first()->id,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'id_card' => null,
            'voters_card' => null,
            'drivers_licence' => null,
        ];
    }
}
