<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'custom_id' => 'FIN-1001',
                'name' => 'Alexander Pierce',
                'email' => 'alex@pierce.com',
                'phone' => '9888877777',
                'aadhaar_no' => '123456789012',
                'pan_no' => 'ABCDE1234F',
                'credit_score' => 780,
                'balance' => 90438.50,
                'status' => 'active',
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'tenant_id' => 1,
            ],
            [
                'custom_id' => 'FIN-1002',
                'name' => 'Aditya Sharma',
                'email' => 'aditya@sharma.dev',
                'phone' => '9111122222',
                'aadhaar_no' => '234567890123',
                'pan_no' => 'BCDEF2345G',
                'credit_score' => 820,
                'balance' => 150000.00,
                'status' => 'active',
                'start_date' => '2025-02-15',
                'end_date' => '2026-02-14',
                'tenant_id' => 1,
            ],
            [
                'custom_id' => 'FIN-1003',
                'name' => 'Neha Gupta',
                'email' => 'neha@gupta.biz',
                'phone' => '9222233333',
                'aadhaar_no' => '345678901234',
                'pan_no' => 'CDEFG3456H',
                'credit_score' => 710,
                'balance' => 45000.00,
                'status' => 'active',
                'start_date' => '2025-03-10',
                'end_date' => '2026-03-09',
                'tenant_id' => 1,
            ],
            [
                'custom_id' => 'FIN-1004',
                'name' => 'Vikram Singh',
                'email' => 'vikram@singh.in',
                'phone' => '9333344444',
                'aadhaar_no' => '456789012345',
                'pan_no' => 'DEFGH4567I',
                'credit_score' => 650,
                'balance' => 12500.00,
                'status' => 'pending',
                'start_date' => '2025-04-01',
                'end_date' => '2026-03-31',
                'tenant_id' => 1,
            ],
            [
                'custom_id' => 'FIN-1005',
                'name' => 'Sara Khan',
                'email' => 'sara@khan.org',
                'phone' => '9444455555',
                'aadhaar_no' => '567890123456',
                'pan_no' => 'EFGHI5678J',
                'credit_score' => 795,
                'balance' => 200000.00,
                'status' => 'active',
                'start_date' => '2025-01-20',
                'end_date' => '2026-01-19',
                'tenant_id' => 1,
            ],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['email' => $client['email']], $client);
        }
    }
}
