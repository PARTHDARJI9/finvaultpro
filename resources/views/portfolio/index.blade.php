<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-white tracking-tighter uppercase italic">Portfolio Yield Matrix</h2>
            <div class="flex space-x-2">
                <button class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold uppercase tracking-widest shadow-lg shadow-emerald-500/20 transition-all">
                    Initiate Liquidity Event
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-950 min-h-screen px-4 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-12">
            
            <!-- Strategic Yield Summary -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-gradient-to-br from-indigo-900/40 to-indigo-600/10 p-8 rounded-[2rem] border border-white/10 shadow-3xl">
                    <p class="text-[10px] text-indigo-400 font-black uppercase tracking-[0.2em] mb-4">Capital Deployed</p>
                    <p class="text-4xl font-black text-white tracking-tighter italic">₹{{ number_format($stats['total_invested']) }}</p>
                    <div class="mt-6 flex items-center text-emerald-400 text-xs font-bold">
                        <i class="fas fa-caret-up mr-2"></i> 14.2% Growth vs PY
                    </div>
                </div>
                <div class="glass p-8 rounded-[2rem] border border-white/10 relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 text-white/[0.02] text-8xl"><i class="fas fa-chart-line"></i></div>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-[0.2em] mb-4">Total Realized Yield</p>
                    <p class="text-4xl font-black text-emerald-400 tracking-tighter italic">₹{{ number_format($stats['realized_yield']) }}</p>
                    <p class="mt-6 text-[10px] text-slate-600 font-bold uppercase tracking-widest leading-none">Net Return (Alpha)</p>
                </div>
                <div class="glass p-8 rounded-[2rem] border border-white/10 relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 text-white/[0.02] text-8xl"><i class="fas fa-percentage"></i></div>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-[0.2em] mb-4">Expected Pipeline</p>
                    <p class="text-4xl font-black text-indigo-400 tracking-tighter italic">₹{{ number_format($stats['expected_yield']) }}</p>
                    <p class="mt-6 text-[10px] text-slate-600 font-bold uppercase tracking-widest leading-none">Projected Collection</p>
                </div>
                <div class="glass p-8 rounded-[2rem] border border-white/10 relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 text-white/[0.02] text-8xl"><i class="fas fa-shield-alt"></i></div>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-[0.2em] mb-4">Exposure Risk</p>
                    <p class="text-4xl font-black text-rose-500 tracking-tighter italic">0.42%</p>
                    <p class="mt-6 text-[10px] text-slate-600 font-bold uppercase tracking-widest leading-none">Delinquency Ratio</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Yield Allocation -->
                <div class="bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-md">
                    <h3 class="text-lg font-black text-white italic tracking-tighter uppercase mb-2">Portfolio Segment Distribution</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mb-12">Capital Allocation Optimization ACTIVE</p>
                    
                    <div class="space-y-8">
                        <div>
                            <div class="flex justify-between items-end mb-3">
                                <span class="text-sm font-bold text-white uppercase tracking-tighter italic">Unsecured Personal Assets</span>
                                <span class="text-indigo-400 font-black tracking-tighter">65%</span>
                            </div>
                            <div class="w-full h-3 bg-white/5 rounded-full overflow-hidden p-0.5 border border-white/5">
                                <div class="h-full bg-gradient-to-r from-indigo-600 to-indigo-400 rounded-full shadow-[0_0_15px_rgba(99,102,241,0.5)]" style="width: 65%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-end mb-3">
                                <span class="text-sm font-bold text-white uppercase tracking-tighter italic">Secured SME Inventory</span>
                                <span class="text-fuchsia-400 font-black tracking-tighter">25%</span>
                            </div>
                            <div class="w-full h-3 bg-white/5 rounded-full overflow-hidden p-0.5 border border-white/5">
                                <div class="h-full bg-gradient-to-r from-fuchsia-600 to-fuchsia-400 rounded-full shadow-[0_0_15px_rgba(168,85,247,0.5)]" style="width: 25%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-end mb-3">
                                <span class="text-sm font-bold text-white uppercase tracking-tighter italic">Distressed Yield Pool</span>
                                <span class="text-amber-400 font-black tracking-tighter">10%</span>
                            </div>
                            <div class="w-full h-3 bg-white/5 rounded-full overflow-hidden p-0.5 border border-white/5">
                                <div class="h-full bg-gradient-to-r from-amber-600 to-amber-400 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.5)]" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live Stream of Recovery -->
                <div class="bg-white/5 border border-white/10 p-10 rounded-[2.5rem] backdrop-blur-md relative overflow-hidden">
                    <div class="absolute top-10 right-10 text-[10px] font-black text-emerald-400 animate-pulse tracking-[0.2em]">LIVE ENGINE</div>
                    <h3 class="text-lg font-black text-white italic tracking-tighter uppercase mb-2">Alpha Stream History</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mb-12">IDENTIFIED YIELD EVENTS</p>

                    <div class="space-y-6">
                        @foreach($transactions as $tx)
                        <div class="flex items-center justify-between p-4 bg-black/20 border border-white/5 rounded-2xl hover:bg-white/5 transition-all text-xs">
                            <div class="flex items-center space-x-4">
                                <i class="fas fa-coins text-amber-400"></i>
                                <div>
                                    <p class="font-bold text-white tracking-widest">{{ $tx->client?->name ?? 'Guest Client' }} <span class="text-slate-600 font-normal select-none">|</span> Settlement</p>
                                    <p class="text-[9px] text-slate-600 uppercase mt-0.5">{{ $tx->created_at->diffForHumans() }} via {{ $tx->payment_method ?? 'Unknown' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-black text-emerald-400 tracking-tighter italic">+₹{{ number_format($tx->amount) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
