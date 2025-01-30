<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Demo Company',
            'email' => 'info@democompany.com',
            'phone' => '1234567890',
            'address' => '123 Business Street, Lagos, Nigeria',
        ]);
    }
}
