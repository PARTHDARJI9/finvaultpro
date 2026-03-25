<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-1.5 h-8 bg-rose-500 rounded-full animate-pulse"></div>
                <h2 class="font-black text-3xl text-white tracking-widest uppercase italic">Compliance Vault</h2>
            </div>
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-3 bg-emerald-500/10 border border-emerald-500/20 px-6 py-3 rounded-2xl">
                    <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-ping"></div>
                    <span class="text-[10px] text-emerald-400 font-black tracking-[0.2em] uppercase">Security Integrity: 100%</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-[1600px] mx-auto space-y-12 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Security Audit Stream -->
            <div class="lg:col-span-3 bg-white/5 border border-white/10 rounded-[3rem] backdrop-blur-3xl overflow-hidden relative shadow-2xl">
                <div class="p-10 border-b border-white/5 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-2">Immutable Audit Trail</h3>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Tracking All Strategic Operations and Identity Validations</p>
                    </div>
                </div>
                
                <div class="p-8 space-y-6 max-h-[700px] overflow-y-auto custom-scrollbar">
                    <!-- Sample Audit Item -->
                    <div class="flex items-start space-x-6 p-6 bg-black/40 border-l-4 border-l-emerald-500 rounded-2xl group transition-all hover:bg-slate-900 shadow-lg">
                        <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-500 shrink-0">
                            <i class="fas fa-user-shield text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-xs font-black text-white italic uppercase tracking-tighter">Identity Verified: Alexander Pierce</h4>
                                <span class="text-[9px] font-black text-slate-600 uppercase tracking-widest tabular-nums italic">25 MAR 2026 - 16:12:08</span>
                            </div>
                            <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wide leading-relaxed">System committed Aadhaar Artifact and PAN consistency check. Risk profile set to **INVESTOR-GRADE**.</p>
                            <div class="mt-4 flex items-center space-x-4">
                                <span class="text-[8px] px-3 py-1 bg-white/5 rounded-lg font-black text-slate-500 uppercase tracking-widest">Actor: Director Root</span>
                                <span class="text-[8px] px-3 py-1 bg-white/5 rounded-lg font-black text-slate-500 uppercase tracking-widest italic">IP: 192.168.1.1</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-6 p-6 bg-black/40 border-l-4 border-l-indigo-500 rounded-2xl group transition-all hover:bg-slate-900 shadow-lg">
                        <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center text-indigo-500 shrink-0">
                            <i class="fas fa-layer-group text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-xs font-black text-white italic uppercase tracking-tighter">Protocol Configuration: Multi-Tenancy Layer</h4>
                                <span class="text-[9px] font-black text-slate-600 uppercase tracking-widest tabular-nums italic">25 MAR 2026 - 14:05:30</span>
                            </div>
                            <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wide leading-relaxed">Validated database schema consistency for new institutional tenant deployment.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-6 p-6 bg-black/40 border-l-4 border-l-rose-500 rounded-2xl group transition-all hover:bg-slate-900 shadow-lg">
                        <div class="w-12 h-12 bg-rose-500/10 rounded-xl flex items-center justify-center text-rose-500 shrink-0">
                            <i class="fas fa-bug text-xl"></i>
                        </div>
                        <div class="flex-1 text-slate-400">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-xs font-black text-white italic uppercase tracking-tighter text-rose-500/80 underline decoration-rose-500/30">Registry Access Attempt: Rejected</h4>
                                <span class="text-[9px] font-black text-slate-600 uppercase tracking-widest tabular-nums italic">25 MAR 2026 - 12:44:12</span>
                            </div>
                            <p class="text-[11px] font-bold uppercase tracking-wide">Unauthorized session attempt detected from unknown proxy. Firewall blocked connection.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KYC & Global Sanctions -->
            <div class="space-y-8">
                <div class="bg-black border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl shadow-2xl relative overflow-hidden group">
                    <h3 class="text-xs font-black text-emerald-400 uppercase tracking-[0.4em] mb-8">KYC Velocity</h3>
                    <div class="flex items-center justify-between">
                        <div class="w-24 h-24 rounded-full border-8 border-indigo-600/20 border-t-indigo-600 flex items-center justify-center relative">
                            <span class="text-xl font-black text-white italic">84%</span>
                        </div>
                        <div class="text-right">
                           <p class="text-[10px] font-black text-white uppercase tracking-widest mb-1">94 Pending</p>
                           <p class="text-[10px] font-black text-emerald-500 uppercase tracking-widest">482 Cleared</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl shadow-2xl relative overflow-hidden group">
                   <h3 class="text-xs font-black text-yellow-500 uppercase tracking-[0.4em] mb-8 flex items-center">
                       <i class="fas fa-globe mr-4 text-lg"></i> Global Sanctions
                   </h3>
                   <div class="p-6 bg-black/60 rounded-2xl border border-white/5">
                       <p class="text-[9px] text-slate-500 font-bold uppercase tracking-widest mb-4">Latest Dataset Hash:</p>
                       <p class="text-[10px] text-white font-black break-all tabular-nums italic opacity-40 group-hover:opacity-100 transition-opacity">0x4F92B3C...E7A4A</p>
                       <div class="mt-6 flex items-center justify-between text-yellow-500/80">
                           <span class="text-[8px] font-black uppercase tracking-widest">Updated: 15m ago</span>
                           <i class="fas fa-check-circle"></i>
                       </div>
                   </div>
                </div>

                <div class="bg-indigo-600 hover:bg-indigo-700 p-8 rounded-[2.5rem] flex items-center justify-center transition-all cursor-pointer shadow-[0_20px_60px_rgba(79,70,229,0.35)] group">
                    <span class="text-[10px] font-black text-white uppercase tracking-[0.4em] italic group-hover:scale-110 transition-transform">Run Compliance Check</span>
                    <i class="fas fa-bolt ml-4 text-white"></i>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
