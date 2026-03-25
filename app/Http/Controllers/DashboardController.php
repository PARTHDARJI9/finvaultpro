<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Loan;
use App\Models\Emi;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'active_clients' => Client::where('status', 'active')->count(),
            'total_aum' => Loan::whereIn('status', ['active', 'pending'])->sum('principal_amount'),
            'total_recovery' => Transaction::where('category', 'repayment')->sum('amount'),
            'this_month_recovery' => Transaction::where('category', 'repayment')
                                    ->whereMonth('created_at', Carbon::now()->month)
                                    ->sum('amount'),
            'pending_emis' => Emi::where('status', 'unpaid')
                                ->where('due_date', '<', Carbon::now()->addDays(7))
                                ->count(),
        ];

        // Recovery Trends for Chart
        $recoveryTrends = Transaction::where('category', 'repayment')
            ->selectRaw('DATE_FORMAT(created_at, "%b") as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('created_at')
            ->get();

        $recentTransactions = Transaction::with(['client', 'performer'])
                                ->orderBy('id', 'desc')
                                ->limit(5)
                                ->get();

        return view('dashboard', compact('stats', 'recoveryTrends', 'recentTransactions'));
    }
}
