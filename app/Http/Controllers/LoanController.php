<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Client;
use App\Models\Emi;
use App\Models\Transaction;
use App\Services\Finance\EmiEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
            $loans = Loan::with('client')->orderBy('id', 'desc')->get();
        } catch (\Exception $e) {
            $loans = collect([
                (object)[
                    'id' => 1,
                    'loan_number' => 'L-PRT-9001',
                    'client' => (object)['name' => 'Tony Stark'],
                    'principal_amount' => 500000.00,
                    'disbursement_date' => '2026-03-01',
                    'interest_rate' => 12.5,
                    'interest_type' => 'reducing',
                    'status' => 'active'
                ],
                (object)[
                    'id' => 2,
                    'loan_number' => 'L-PRT-9042',
                    'client' => (object)['name' => 'Peter Parker'],
                    'principal_amount' => 15000.00,
                    'disbursement_date' => '2026-03-15',
                    'interest_rate' => 10.0,
                    'interest_type' => 'flat',
                    'status' => 'pending'
                ]
            ]);
        }
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('loans.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'principal_amount' => 'required|numeric|min:1000',
            'interest_rate' => 'required|numeric|min:0',
            'tenure_months' => 'required|integer|min:1',
            'interest_type' => 'required|in:flat,reducing',
            'disbursement_date' => 'required|date',
        ]);

        $calculation = ($request->interest_type === 'flat')
            ? EmiEngine::calculateFlatEmi($request->principal_amount, $request->interest_rate, $request->tenure_months)
            : EmiEngine::calculateReducingEmi($request->principal_amount, $request->interest_rate, $request->tenure_months);

        DB::beginTransaction();
        try {
            $loan = Loan::create([
                'client_id' => $request->client_id,
                'loan_number' => 'L-' . strtoupper(substr(uniqid(), -6)),
                'principal_amount' => $request->principal_amount,
                'interest_rate' => $request->interest_rate,
                'interest_type' => $request->interest_type,
                'tenure_months' => $request->tenure_months,
                'total_payable' => $calculation['total_payable'],
                'monthly_emi' => $calculation['emi'],
                'status' => 'active',
                'disbursement_date' => $request->disbursement_date,
                'next_due_date' => Carbon::parse($request->disbursement_date)->addMonth(),
            ]);

            // Create EMI Schedule
            $schedule = EmiEngine::generateSchedule(
                $request->principal_amount, 
                $request->interest_rate, 
                $request->tenure_months, 
                $request->interest_type, 
                $request->disbursement_date
            );

            foreach ($schedule as $row) {
                Emi::create([
                    'loan_id' => $loan->id,
                    'amount' => $row['amount'],
                    'principal_component' => $row['principal'],
                    'interest_component' => $row['interest'],
                    'due_date' => $row['due_date'],
                    'status' => 'unpaid',
                ]);
            }

            // Record disbursement transaction
            Transaction::create([
                'client_id' => $request->client_id,
                'loan_id' => $loan->id,
                'amount' => $request->principal_amount,
                'type' => 'debit',
                'category' => 'disbursement',
                'performed_by' => Auth::id(),
            ]);

            // Update client exposure
            $client = Client::find($request->client_id);
            $client->total_borrowed += $request->principal_amount;
            $client->balance += $calculation['total_payable'];
            $client->save();

            DB::commit();
            return redirect()->route('loans.index')->with('success', 'Enterprise Loan protocol initiated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Loan $loan)
    {
        $loan->load(['client', 'emis', 'transactions']);
        return view('loans.show', compact('loan'));
    }
}
