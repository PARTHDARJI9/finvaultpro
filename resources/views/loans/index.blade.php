<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-white tracking-tighter">Loan Management Terminal</h2>
            <a href="{{ route('loans.create') }}" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-lg shadow-indigo-500/20 transition-all hover:scale-105 active:scale-95 font-bold">
                + Initiate Asset Disbursement
            </a>
        </div>
    </x-slot>

    <div class="px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Filter Bar -->
            <div class="bg-white/5 border border-white/10 p-4 rounded-2xl mb-8 flex flex-wrap gap-4 items-center backdrop-blur-md">
                <div class="flex-1 min-w-[300px] relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                    <input type="text" placeholder="Filter by Loan ID or Client..." class="w-full pl-12 pr-4 py-3 bg-black/20 border border-white/5 rounded-xl text-white focus:ring-1 focus:ring-indigo-500 transition-all">
                </div>
                <div class="flex space-x-2">
                    <button class="px-4 py-3 bg-indigo-500/10 text-indigo-400 rounded-xl border border-indigo-500/20 text-xs font-bold uppercase tracking-widest">Active Only</button>
                    <button class="px-4 py-3 bg-white/5 text-slate-400 rounded-xl border border-white/5 text-xs font-bold uppercase tracking-widest hover:text-white">All Records</button>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden backdrop-blur-sm shadow-2xl">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/[0.02] text-slate-500 text-[10px] uppercase font-black tracking-[0.2em] border-b border-white/5">
                            <th class="py-6 px-8">Agreement ID</th>
                            <th class="py-6 px-8">Counterparty</th>
                            <th class="py-6 px-8">Capital Amount</th>
                            <th class="py-6 px-8">Yield Rate</th>
                            <th class="py-6 px-8">Status</th>
                            <th class="py-6 px-8 text-right">Terminal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($loans as $loan)
                        <tr class="hover:bg-white/[0.03] transition-all group">
                            <td class="py-6 px-8">
                                <span class="font-mono text-indigo-400 font-bold tracking-tighter">{{ $loan->loan_number }}</span>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-[10px] font-bold text-white border border-white/10">
                                        {{ strtoupper(substr($loan->client->name, 0, 1)) }}
                                    </div>
                                    <span class="text-white font-bold">{{ $loan->client->name }}</span>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <p class="text-white font-black tracking-tighter">₹{{ number_format($loan->principal_amount) }}</p>
                                <p class="text-[10px] text-slate-500 uppercase font-bold tracking-tighter mt-0.5">Disbursed {{ $loan->disbursement_date }}</p>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex items-center space-x-2 text-emerald-400">
                                    <span class="text-sm font-bold">{{ $loan->interest_rate }}%</span>
                                    <span class="text-[9px] px-1.5 py-0.5 bg-emerald-500/10 rounded border border-emerald-500/20 uppercase">{{ $loan->interest_type }}</span>
                                </div>
                            </td>
                            <td class="py-6 px-8 text-xs">
                                <span class="px-3 py-1 bg-white/5 text-slate-300 font-bold rounded-full border border-white/10 uppercase tracking-widest text-[9px]">
                                    {{ $loan->status }}
                                </span>
                            </td>
                            <td class="py-6 px-8 text-right ">
                                <a href="{{ route('loans.show', $loan->id) }}" class="text-slate-500 hover:text-white transition-colors p-2 h-10 w-10 bg-white/5 rounded-lg border border-white/10 inline-flex items-center justify-center">
                                    <i class="fas fa-chevron-right text-xs"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($loans->isEmpty())
            <div class="mt-20 text-center py-20 px-8 bg-white/5 rounded-3xl border border-dashed border-white/10">
                <i class="fas fa-archive text-5xl text-slate-700 mb-6 block"></i>
                <h3 class="text-xl font-bold text-slate-400">No Active Loan Assets Identified</h3>
                <p class="text-slate-500 mt-2 max-w-sm mx-auto">The asset management database is currently clear. Begin by disbursing capital to verified clients.</p>
                <a href="{{ route('loans.create') }}" class="mt-8 inline-block px-8 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-500/20">Initial Disbursement</a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
