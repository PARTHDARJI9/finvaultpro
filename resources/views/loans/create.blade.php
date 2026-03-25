<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-white tracking-tighter">New Asset Allocation Protocol</h2>
            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest bg-white/5 px-3 py-1.5 rounded-lg border border-white/5">Compliance Check Inactive</span>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-950 min-h-screen px-4 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <form action="{{ route('loans.store') }}" method="POST" class="space-y-12">
                @csrf
                
                <!-- Counterparty Selection -->
                <div class="bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-md shadow-2xl">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-10 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center mr-3 text-[10px] text-white">01</span>
                        Identify Verified Counterparty
                    </h3>
                    <div class="grid grid-cols-1 gap-8">
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mb-3 px-1">Select Member Account</p>
                            <select name="client_id" class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white outline-none focus:ring-2 focus:ring-indigo-500/50 appearance-none transition-all cursor-pointer">
                                <option value="" disabled selected>-- ACCESS MEMBER DATABASE --</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}" class="bg-slate-900 border-none">{{ $client->name }} ({{ $client->phone }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Financial Configuration -->
                <div class="bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-md shadow-2xl">
                    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-10 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center mr-3 text-[10px] text-white">02</span>
                        Asset Allocation Configuration
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mb-3 px-1">Principal Capital (INR)</p>
                            <input type="number" name="principal_amount" placeholder="e.g. 500000" class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all font-mono text-xl tracking-tighter" required>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mb-3 px-1">Interest Yield Rate (%)</p>
                            <div class="relative">
                                <input type="number" step="0.01" name="interest_rate" placeholder="12.00" class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all font-mono text-xl tracking-tighter" required>
                                <span class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-500 text-sm font-bold">% PA</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mb-3 px-1">Amortization Tenure (Months)</p>
                            <input type="number" name="tenure_months" placeholder="12" class="w-full bg-black/40 border border-white/10 rounded-2xl py-4 px-6 text-white outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all font-mono text-xl tracking-tighter" required>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase font-black tracking-widest mb-3 px-1">Interest Protocol</p>
                            <div class="grid grid-cols-2 gap-2 bg-black/40 p-2 rounded-2xl border border-white/10">
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="interest_type" value="flat" class="peer hidden" checked>
                                    <div class="text-center py-2.5 rounded-xl text-xs font-bold uppercase tracking-widest text-slate-500 peer-checked:bg-white/10 peer-checked:text-white transition-all">Flat Base</div>
                                </label>
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="interest_type" value="reducing" class="peer hidden">
                                    <div class="text-center py-2.5 rounded-xl text-xs font-bold uppercase tracking-widest text-slate-500 peer-checked:bg-white/10 peer-checked:text-white transition-all">Reducing Bal</div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Final Protocol Initiation -->
                <div class="bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-md shadow-2xl">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex-1">
                            <h4 class="text-white font-black text-xl mb-1 tracking-tighter uppercase italic">Authorize & Disburse</h4>
                            <p class="text-xs text-slate-500 font-bold uppercase leading-relaxed tracking-tighter max-w-sm">Initiating this protocol will generate an immutable amortization schedule and record the disbursement in the ledger flow.</p>
                        </div>
                        <div class="w-full md:w-auto">
                            <input type="date" name="disbursement_date" class="bg-black/40 border border-white/10 rounded-xl py-3 px-4 text-xs font-bold text-indigo-400 mb-6 w-full block outline-none">
                            <button type="submit" class="w-full px-12 py-5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl shadow-xl shadow-indigo-600/20 font-black text-sm uppercase tracking-widest transition-all hover:scale-105 active:scale-95 active:translate-y-1">
                                Execute Protocol <i class="fas fa-shield-alt ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
