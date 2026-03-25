<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-1.5 h-8 bg-indigo-600 rounded-full animate-pulse"></div>
                <h2 class="font-black text-3xl text-white tracking-widest uppercase italic">Strategic Reporting</h2>
            </div>
            <div class="flex items-center space-x-4">
               <button class="bg-white/5 border border-white/10 px-6 py-2 rounded-xl text-[10px] font-black uppercase text-slate-400 hover:text-white transition-all">Schedule Auto-Export</button>
            </div>
        </div>
    </x-slot>

    <div class="max-w-[1600px] mx-auto space-y-12 pb-12">
        <!-- Reporting Engine Status -->
        <div class="bg-indigo-600/10 border border-indigo-600/20 p-10 rounded-[3rem] backdrop-blur-3xl relative overflow-hidden group">
            <div class="absolute -top-12 -right-12 w-64 h-64 bg-indigo-600/10 blur-[100px] rounded-full group-hover:bg-indigo-600/30 transition-all"></div>
            <div class="flex items-center space-x-8 relative z-10">
                <div class="w-16 h-16 bg-indigo-600/20 rounded-2xl flex items-center justify-center text-indigo-400 border border-indigo-500/30 shadow-2xl">
                    <i class="fas fa-microchip text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-2">Predictive Logic Engine: Active</h3>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Generating Real-time Exposure and Default Probability Models</p>
                </div>
            </div>
        </div>

        <!-- Export Hub -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Statutory Financials Card -->
            <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl hover:border-indigo-500/30 transition-all group">
                <h3 class="text-xs font-black text-indigo-400 uppercase tracking-[0.4em] mb-8 flex items-center">
                    <i class="fas fa-file-invoice-dollar mr-4 text-lg"></i> Statutory Financials
                </h3>
                <div class="space-y-6">
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Profit & Loss Statement</span>
                        <i class="fas fa-file-pdf text-rose-500 opacity-40 group-hover/item:opacity-100"></i>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Consolidated Balance Sheet</span>
                        <i class="fas fa-file-excel text-emerald-500 opacity-40 group-hover/item:opacity-100"></i>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Cash Flow Analysis</span>
                        <i class="fas fa-download text-indigo-400 opacity-40 group-hover/item:opacity-100"></i>
                    </button>
                </div>
            </div>

            <!-- Risk Assessment Hub -->
            <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl hover:border-fuchsia-500/30 transition-all group">
                <h3 class="text-xs font-black text-fuchsia-400 uppercase tracking-[0.4em] mb-8 flex items-center">
                    <i class="fas fa-shield-virus mr-4 text-lg"></i> Risk Analytics
                </h3>
                <div class="space-y-6">
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all border-l-4 border-l-rose-500/50">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest text-rose-500/80">Delinquency Forecast</span>
                        <i class="fas fa-exclamation-triangle text-rose-500 animate-pulse"></i>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Bucket Aging Report</span>
                        <i class="fas fa-chart-line text-fuchsia-400 opacity-40"></i>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Concentration Risk</span>
                        <i class="fas fa-vector-square text-fuchsia-400 opacity-40"></i>
                    </button>
                </div>
            </div>

            <!-- Client Portfolio Dynamics -->
            <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl hover:border-emerald-500/30 transition-all group">
                <h3 class="text-xs font-black text-emerald-400 uppercase tracking-[0.4em] mb-8 flex items-center">
                    <i class="fas fa-user-chart mr-4 text-lg"></i> Counterparty Intelligence
                </h3>
                <div class="space-y-6">
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Client Engagement Map</span>
                        <i class="fas fa-globe-americas text-emerald-500 opacity-40"></i>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Revenue Per Relation</span>
                        <i class="fas fa-hand-holding-usd text-emerald-500 opacity-40"></i>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-2xl group/item hover:bg-slate-900 transition-all">
                        <span class="text-xs font-bold text-slate-300 group-hover/item:text-white uppercase tracking-widest">Churn Probability Model</span>
                        <i class="fas fa-user-slash text-rose-500/80 opacity-40"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-white/5 border border-white/10 p-12 rounded-[4rem] backdrop-blur-3xl text-center">
            <h3 class="text-xs font-black text-slate-600 uppercase tracking-[0.6em] italic">Full Fiscal Intelligence Engine Initialized</h3>
            <p class="mt-4 text-[9px] text-slate-700 font-black uppercase tracking-[0.3em]">End of Month Closeout Required for Consolidated Export Generation</p>
        </div>
    </div>
</x-app-layout>
