<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 lg:gap-0">
            <div>
                <h2 class="font-black text-xl lg:text-2xl text-white italic tracking-tighter uppercase leading-tight">
                    Executive Terminal <span class="hidden sm:inline text-[10px] text-indigo-400 font-bold ml-4 tracking-[0.3em] opacity-50 italic">Ops Layer 1.0</span>
                </h2>
                <p class="lg:hidden text-[9px] font-black text-slate-500 uppercase tracking-widest mt-1">Institutional Access: ACTIVE</p>
            </div>
            <div class="flex items-center space-x-4 lg:space-x-6">
                <button class="flex-1 lg:flex-none bg-white/5 border border-white/10 px-6 py-3 rounded-xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-white hover:bg-white/10 transition-all">Export</button>
                <a href="{{ route('loans.create') }}" class="flex-1 lg:flex-none bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-center transition-all shadow-lg shadow-indigo-600/30">+ Create</a>
            </div>
        </div>
    </x-slot>

    <div class="space-y-12">
        <!-- KPI Analytics Layer -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl relative overflow-hidden group hover:border-indigo-500/30 transition-all">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-600/10 blur-[50px] rounded-full group-hover:bg-indigo-600/30 transition-all"></div>
                <div class="flex items-center justify-between mb-8">
                    <div class="w-12 h-12 bg-indigo-600/20 rounded-2xl flex items-center justify-center text-indigo-400 shadow-xl border border-indigo-500/10">
                        <i class="fas fa-user-group text-lg"></i>
                    </div>
                    <span class="text-[10px] font-black text-emerald-400 tracking-widest uppercase italic">+12% vs LY</span>
                </div>
                <h3 class="text-slate-500 text-[10px] font-black uppercase tracking-[0.4em] mb-2 mb-1">Active Clients</h3>
                <p class="text-4xl font-black text-white italic tracking-tighter">{{ number_format($stats['active_clients']) }}</p>
            </div>

            <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl relative overflow-hidden group hover:border-emerald-500/30 transition-all">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-emerald-600/10 blur-[50px] rounded-full group-hover:bg-emerald-600/30 transition-all"></div>
                <div class="flex items-center justify-between mb-8">
                    <div class="w-12 h-12 bg-emerald-600/20 rounded-2xl flex items-center justify-center text-emerald-400 shadow-xl border border-emerald-500/10">
                        <i class="fas fa-sack-dollar text-lg"></i>
                    </div>
                    <span class="text-[10px] font-black text-emerald-400 tracking-widest uppercase italic">Target Reached</span>
                </div>
                <h3 class="text-slate-500 text-[10px] font-black uppercase tracking-[0.4em] mb-2">Loan AUM</h3>
                <p class="text-4xl font-black text-white italic tracking-tighter">₹{{ number_format($stats['total_aum'] / 100000, 2) }}L</p>
            </div>

            <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl relative overflow-hidden group hover:border-fuchsia-500/30 transition-all">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-fuchsia-600/10 blur-[50px] rounded-full group-hover:bg-fuchsia-600/30 transition-all"></div>
                <div class="flex items-center justify-between mb-8">
                    <div class="w-12 h-12 bg-fuchsia-600/20 rounded-2xl flex items-center justify-center text-fuchsia-400 shadow-xl border border-fuchsia-500/10">
                        <i class="fas fa-chart-line text-lg"></i>
                    </div>
                    <span class="text-[10px] font-black text-indigo-400 tracking-widest uppercase italic">98% Recovery</span>
                </div>
                <h3 class="text-slate-500 text-[10px] font-black uppercase tracking-[0.4em] mb-2">Monthly Yield</h3>
                <p class="text-4xl font-black text-white italic tracking-tighter">₹{{ number_format($stats['this_month_recovery'] / 1000, 1) }}K</p>
            </div>

            <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl relative overflow-hidden group hover:border-amber-500/30 transition-all">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-amber-600/10 blur-[50px] rounded-full group-hover:bg-amber-600/30 transition-all"></div>
                <div class="flex items-center justify-between mb-8">
                    <div class="w-12 h-12 bg-amber-600/20 rounded-2xl flex items-center justify-center text-amber-400 shadow-xl border border-amber-500/10">
                        <i class="fas fa-bell text-lg"></i>
                    </div>
                    <span class="text-[10px] font-black text-rose-500 tracking-widest uppercase italic">Critical Alerts</span>
                </div>
                <h3 class="text-slate-500 text-[10px] font-black uppercase tracking-[0.4em] mb-2">Due EMIs (7d)</h3>
                <p class="text-4xl font-black text-white italic tracking-tighter">{{ $stats['pending_emis'] }}</p>
            </div>
        </div>

        <!-- Analytical Center -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Portfolio Trends Area -->
            <div class="lg:col-span-2 bg-white/5 border border-white/10 p-12 rounded-[4rem] backdrop-blur-3xl relative shadow-2xl">
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-2">Financial Trends Portfolio</h3>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">AUM vs Revenue Trajectory Modelling</p>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex items-center space-x-2 bg-indigo-500/10 px-4 py-2 rounded-lg border border-indigo-500/10">
                            <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                            <span class="text-[9px] font-black text-indigo-400 uppercase tracking-widest">Revenue</span>
                        </div>
                        <div class="flex items-center space-x-2 bg-emerald-500/10 px-4 py-2 rounded-lg border border-emerald-500/10">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                            <span class="text-[9px] font-black text-emerald-400 uppercase tracking-widest">Recovery</span>
                        </div>
                    </div>
                </div>
                <div id="recoveryChart" class="w-full"></div>
            </div>

            <!-- Operational Stream (Live Activity) -->
            <div class="bg-white/5 border border-white/10 p-12 rounded-[4rem] backdrop-blur-3xl relative overflow-hidden shadow-2xl">
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-2">Live Stream</h3>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Real-time Settlement Hub</p>
                    </div>
                    <div class="w-3 h-3 bg-indigo-500 rounded-full animate-ping"></div>
                </div>
                <div class="space-y-8 h-[380px] overflow-y-auto custom-scrollbar pr-4">
                    @forelse($recentTransactions as $tx)
                    <div class="flex items-start space-x-6 group transition-all">
                        <div class="shrink-0 relative">
                            <div class="w-12 h-12 rounded-2xl bg-slate-900 border border-white/10 flex items-center justify-center text-white font-black italic shadow-xl group-hover:scale-110 transition-transform">
                                {{ strtoupper(substr($tx->client->name, 0, 1)) }}
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-[3px] border-slate-950"></div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-1">
                                <p class="text-xs font-black text-white uppercase italic tracking-tighter truncate">{{ $tx->client->name }}</p>
                                <p class="text-xs font-black text-emerald-400 italic font-mono">+₹{{ number_format($tx->amount) }}</p>
                            </div>
                            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mb-2">via <span class="text-indigo-400 underline decoration-indigo-400/20">{{ $tx->payment_method ?? 'Unknown' }}</span></p>
                            <p class="text-[9px] text-slate-600 font-black uppercase tracking-widest italic opacity-60">{{ $tx->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="h-full flex flex-col items-center justify-center text-center">
                        <i class="fas fa-inbox text-4xl text-slate-800 mb-4 opacity-20"></i>
                        <p class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em]">No Settlement Delta Detected</p>
                    </div>
                    @endforelse
                </div>
                <button class="w-full mt-10 py-5 bg-white/5 hover:bg-white/10 text-white rounded-[2rem] border border-white/10 transition-all font-black text-[10px] uppercase tracking-[0.3em] italic">
                    View Comprehensive Ledger
                </button>
            </div>
        </div>

        <!-- Risk Monitoring Protocol (Delinquency Watchlist) -->
        <div class="bg-white/5 border border-white/10 rounded-[2.5rem] lg:rounded-[4rem] backdrop-blur-3xl overflow-hidden shadow-3xl relative">
            <div class="p-8 lg:p-12 pb-8 flex flex-col md:flex-row md:items-center justify-between gap-6 border-b border-white/5">
                <div>
                    <h3 class="text-xl lg:text-2xl font-black text-white italic tracking-tighter uppercase mb-2">Risk Watchlist</h3>
                    <p class="text-[9px] lg:text-[11px] text-slate-500 font-bold uppercase tracking-widest">Real-time Exposure Metrics & Provisioning Probabilities</p>
                </div>
                <a href="{{ route('clients.index') }}" class="bg-indigo-600/10 hover:bg-indigo-600 text-indigo-400 hover:text-white px-8 lg:px-10 py-3 rounded-2xl transition-all border border-indigo-500/20 font-black text-[10px] uppercase tracking-widest text-center">Open Registry Hub</a>
            </div>
            
            <div class="overflow-x-auto p-4 lg:p-12 pt-4">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-slate-600 text-[10px] font-black uppercase tracking-[0.4em] border-b border-white/5">
                            <th class="py-10 px-6">Institutional Identity</th>
                            <th class="py-10 px-6 hidden md:table-cell">Protocol ID</th>
                            <th class="py-10 px-6 text-center hidden lg:table-cell">Credit</th>
                            <th class="py-10 px-6">Exposure</th>
                            <th class="py-10 px-6 hidden sm:table-cell">Due</th>
                            <th class="py-10 px-6 text-right">Risk Pulse</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.03]">
                        @php $clients = \App\Models\Client::with('loans')->take(5)->get(); @endphp
                        @forelse($clients as $client)
                        <tr class="group hover:bg-white/5 transition-all">
                            <td class="py-6 lg:py-10 px-3 lg:px-6">
                                <div class="flex items-center space-x-4 lg:space-x-6">
                                    <div class="w-12 h-12 lg:w-14 lg:h-14 bg-slate-900 border border-white/5 rounded-2xl flex items-center justify-center text-white font-black italic shadow-lg shrink-0">
                                        {{ strtoupper(substr($client->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-[10px] lg:text-[11px] font-black text-white uppercase italic tracking-tighter mb-1 truncate max-w-[80px] sm:max-w-none md:max-w-none">{{ $client->name }}</p>
                                        <p class="text-[9px] lg:text-[10px] text-slate-600 font-bold uppercase tracking-widest">{{ $client->phone }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-6 lg:py-10 px-3 lg:px-6 tabular-nums font-black text-[10px] text-indigo-400 italic tracking-[0.2em] uppercase hidden md:table-cell">{{ $client->loans->first()->loan_number ?? 'PRT-9001-X' }}</td>
                            <td class="py-6 lg:py-10 px-3 lg:px-6 text-center hidden lg:table-cell">
                                <span class="px-4 py-2 bg-emerald-500/10 text-emerald-500 rounded-xl text-[9px] font-black uppercase tracking-widest border border-emerald-500/20">
                                    Tier {{ $client->credit_score > 750 ? 'A' : 'B' }}
                                </span>
                            </td>
                            <td class="py-6 lg:py-10 px-3 lg:px-6 font-black text-white text-[12px] lg:text-sm italic">₹{{ number_format($client->balance) }}</td>
                            <td class="py-6 lg:py-10 px-3 lg:px-6 text-[10px] font-black text-slate-400 uppercase tracking-widest tabular-nums hidden sm:table-cell">{{ $client->loans->first()->next_due_date ?? 'N/A' }}</td>
                            <td class="py-6 lg:py-10 px-3 lg:px-6 text-right">
                                <div class="flex flex-col items-end space-y-2">
                                    <div class="h-1.5 w-12 lg:w-24 bg-white/5 rounded-full overflow-hidden border border-white/5">
                                        <div class="h-full bg-gradient-to-r from-indigo-500 to-indigo-400 animate-pulse" style="width: 75%"></div>
                                    </div>
                                    <span class="text-[8px] font-black text-slate-600 uppercase tracking-widest opacity-60 italic hidden md:inline">Low Default Prob.</span>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-20 text-center text-slate-700 font-black uppercase tracking-widest text-xs italic">Watchlist Empty. No Risk Anomalies Detected.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="p-12 bg-black/40 text-center">
                <p class="text-[9px] font-black text-slate-700 uppercase tracking-[0.5em] italic">Full Fiscal Watchlist Decrypted via Institutional Protocol Lambda-4</p>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'Revenue Flow',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'Recovery Pipeline',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 350,
                type: 'area',
                background: 'transparent',
                foreColor: '#64748b',
                toolbar: { show: false },
                animations: { speed: 1000 }
            },
            colors: ['#6366f1', '#10b981'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.8,
                    opacityTo: 0.1,
                    stops: [0, 95, 100]
                }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 4 },
            grid: {
                borderColor: 'rgba(255,255,255,0.03)',
                xaxis: { lines: { show: true } }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: { show: true },
            tooltip: { theme: 'dark' },
            legend: { show: false }
        };

        var chart = new ApexCharts(document.querySelector("#recoveryChart"), options);
        chart.render();
    </script>
    @endpush
</x-app-layout>
