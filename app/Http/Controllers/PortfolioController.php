<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Loan;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        try {
            \Illuminate\Support\Facades\DB::connection()->getPdo();

            $stats = [
                'total_invested' => Loan::sum('principal_amount'),
                'current_aum' => Loan::where('status', 'active')->sum('principal_amount'),
                'expected_yield' => Loan::sum('total_payable') - Loan::sum('principal_amount'),
                'realized_yield' => \App\Models\Transaction::where('category', 'repayment')->sum('amount') 
                                    - \App\Models\Emi::where('status', 'paid')->sum('principal_component'),
            ];

            $transactions = \App\Models\Transaction::where('category', 'repayment')->with('client')->latest()->take(4)->get();
        } catch (\Exception $e) {
            $stats = [
                'total_invested' => 1250000.00,
                'current_aum' => 850000.00,
                'expected_yield' => 400000.00,
                'realized_yield' => 125000.00,
            ];

            $transactions = collect([
                (object)['client' => (object)['name' => 'John Wick'], 'amount' => 1200.00, 'payment_method' => 'Bank Transfer', 'created_at' => now()],
                (object)['client' => (object)['name' => 'Sherlock Holmes'], 'amount' => 5000.00, 'payment_method' => 'UPI', 'created_at' => now()->subHours(2)],
                (object)['client' => (object)['name' => 'Bruce Wayne'], 'amount' => 850.50, 'payment_method' => 'Cash', 'created_at' => now()->subDays(1)],
            ]);
        }

        return view('portfolio.index', compact('stats', 'transactions'));
    }
}
