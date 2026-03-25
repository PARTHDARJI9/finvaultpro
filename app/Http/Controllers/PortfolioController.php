<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Loan;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $stats = [
            'total_invested' => Loan::sum('principal_amount'),
            'current_aum' => Loan::where('status', 'active')->sum('principal_amount'),
            'expected_yield' => Loan::sum('total_payable') - Loan::sum('principal_amount'),
            'realized_yield' => \App\Models\Transaction::where('category', 'repayment')->sum('amount') 
                                - \App\Models\Emi::where('status', 'paid')->sum('principal_component'),
        ];

        return view('portfolio.index', compact('stats'));
    }
}
