<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('name')->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $lastClient = Client::latest()->first();
        $nextIdNum = $lastClient ? ($lastClient->id + 1001) : 1001;
        $customId = 'FIN-' . $nextIdNum;
        
        return view('clients.create', compact('customId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:20',
            'aadhaar_no' => 'required|string|size:12',
            'pan_no' => 'required|string|size:10',
            'address' => 'required|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,pending,blocklisted',
            'documents.*' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:51200',
        ]);

        $lastClient = Client::latest()->first();
        $nextIdNum = $lastClient ? ($lastClient->id + 1001) : 1001;
        $customId = 'FIN-' . $nextIdNum;

        $clientData = [
            'user_id' => Auth::id(),
            'tenant_id' => Auth::user()->tenant_id ?? 1,
            'custom_id' => $customId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'aadhaar_no' => $request->aadhaar_no,
            'pan_no' => $request->pan_no,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'balance' => 0,
            'total_borrowed' => 0,
            'total_paid' => 0,
        ];

        $client = Client::create($clientData);

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('clients/documents', 'public');
                \App\Models\Document::create([
                    'client_id' => $client->id,
                    'document_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'document_type' => $file->getClientOriginalExtension(),
                    'status' => 'pending',
                ]);
            }
        }

        return redirect()->route('clients.index')->with('success', 'Entity and associated artifacts successfully committed to the registry.');
    }

    public function show(Client $client)
    {
        $client->load(['loans.emis', 'transactions', 'documents']);
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        // Update logic
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
