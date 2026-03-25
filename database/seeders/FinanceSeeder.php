<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Loan;
use App\Models\Emi;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FinanceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin User
        $admin = User::create([
            'name' => 'Demo Admin',
            'email' => 'admin@finvault.pro',
            'password' => Hash::make('password'),
        ]);

        // 2. Create Clients
        $clients = [
            ['name' => 'Aditya Sharma', 'email' => 'aditya@example.com', 'phone' => '9888877777', 'credit_score' => 750],
            ['name' => 'Rohan Mehta', 'email' => 'rohan@example.com', 'phone' => '9111122222', 'credit_score' => 720],
            ['name' => 'Sanya Kapoor', 'email' => 'sanya@example.com', 'phone' => '9222233333', 'credit_score' => 680],
            ['name' => 'Vikram Singh', 'email' => 'vikram@example.com', 'phone' => '9333344444', 'credit_score' => 810],
            ['name' => 'Neha Gupta', 'email' => 'neha@example.com', 'phone' => '9444455555', 'credit_score' => 790],
        ];

        foreach ($clients as $cData) {
            $client = Client::create($cData);

            // 3. Create active loan for each client
            $principal = rand(50000, 200000);
            $rate = 12.0;
            $tenure = 12;
            $emiValue = ($principal * (1 + ($rate / 100))) / $tenure;
            $totalPayable = $principal * (1 + ($rate / 100));

            $loan = Loan::create([
                'client_id' => $client->id,
                'loan_number' => 'L-' . strtoupper(substr(uniqid(), -6)),
                'principal_amount' => $principal,
                'interest_rate' => $rate,
                'interest_type' => 'flat',
                'tenure_months' => $tenure,
                'total_payable' => $totalPayable,
                'monthly_emi' => $emiValue,
                'status' => 'active',
                'disbursement_date' => Carbon::now()->subMonths(3),
                'next_due_date' => Carbon::now()->addMonth(),
            ]);

            // 4. Create EMI schedule & sample paid EMIs
            for ($i = 1; $i <= $tenure; $i++) {
                $status = ($i <= 3) ? 'paid' : 'unpaid';
                $paidDate = ($i <= 3) ? Carbon::now()->subMonths(3 - $i) : null;

                Emi::create([
                    'loan_id' => $loan->id,
                    'amount' => $emiValue,
                    'principal_component' => $principal / $tenure,
                    'interest_component' => ($principal * ($rate / 100) / 12),
                    'due_date' => Carbon::now()->subMonths(3)->addMonths($i),
                    'paid_date' => $paidDate,
                    'status' => $status,
                ]);

                if ($status === 'paid') {
                    Transaction::create([
                        'client_id' => $client->id,
                        'loan_id' => $loan->id,
                        'amount' => $emiValue,
                        'type' => 'credit',
                        'payment_method' => 'upi',
                        'category' => 'repayment',
                        'performed_by' => $admin->id,
                    ]);
                    
                    $client->total_paid += $emiValue;
                    $client->save();
                }
            }
            
            $client->total_borrowed = $principal;
            $client->balance = $totalPayable - $client->total_paid;
            $client->save();
        }
    }
}
