<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <a href="{{ route('clients.index') }}" class="w-12 h-12 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center text-slate-400 hover:text-white transition-all shadow-xl">
                    <i class="fas fa-chevron-left text-sm"></i>
                </a>
                <div>
                    <h2 class="font-black text-3xl text-white tracking-widest uppercase italic">Entity Dossier: {{ $client->name }}</h2>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">Registry Serial: PID-{{ 1000 + $client->id }} <span class="mx-3 opacity-20">|</span> Authorized Status: <span class="text-emerald-400">ACTIVE</span></p>
                </div>
            </div>
            <div class="flex items-center space-x-6">
               <button class="bg-indigo-600/10 hover:bg-indigo-600 text-indigo-400 hover:text-white px-8 py-3 rounded-2xl transition-all border border-indigo-500/20 font-black text-[10px] uppercase tracking-widest italic">Generate PDF Portfolio</button>
            </div>
        </div>
    </x-slot>

    <div class="max-w-[1700px] mx-auto space-y-12 pb-24">
        <!-- Triple Layer Matrix -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            
            <!-- Strategic Overview (Left Column) -->
            <div class="lg:col-span-1 space-y-12">
                <!-- Entity Card -->
                <div class="bg-white/5 border border-white/10 p-12 rounded-[4rem] backdrop-blur-3xl shadow-2xl relative overflow-hidden group">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-600/10 blur-[50px] rounded-full group-hover:bg-indigo-600/30 transition-all"></div>
                    <div class="flex flex-col items-center text-center">
                        <div class="w-24 h-24 bg-gradient-to-br from-slate-900 to-black rounded-[2.5rem] flex items-center justify-center text-white text-4xl font-black mb-8 border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                           {{ strtoupper(substr($client->name, 0, 1)) }}
                        </div>
                        <h3 class="text-2xl font-black text-white italic tracking-tighter uppercase mb-2">{{ $client->name }}</h3>
                        <p class="text-[10px] text-slate-500 font-black uppercase tracking-[0.4em] italic mb-10">{{ $client->status }} Institution</p>
                        
                        <div class="w-full space-y-6">
                            <div class="flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-3xl shadow-inner group/item hover:bg-slate-900 transition-all">
                                <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest italic">Contact Protocol</span>
                                <span class="text-xs font-black text-indigo-400 italic font-mono">{{ $client->phone }}</span>
                            </div>
                            <div class="flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-3xl shadow-inner group/item hover:bg-slate-900 transition-all">
                                <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest italic">Digital Identity</span>
                                <span class="text-[10px] font-black text-white italic truncate max-w-[120px]">{{ $client->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Score & Health -->
                <div class="bg-white/5 border border-white/10 p-12 rounded-[4rem] backdrop-blur-3xl shadow-2xl relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-10">
                         <h4 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.4em] italic">Institutional Credit Health</h4>
                         <i class="fas fa-microchip text-indigo-500 opacity-30 text-xl"></i>
                    </div>
                    <div class="flex items-center justify-center py-8">
                        <div class="w-40 h-40 rounded-full border-[10px] border-indigo-600/10 border-t-indigo-600 flex flex-col items-center justify-center shadow-inner relative">
                             <div class="absolute inset-4 blur-[30px] bg-indigo-600/20 rounded-full"></div>
                             <span class="text-4xl font-black text-white italic relative z-10">{{ $client->credit_score }}</span>
                             <span class="text-[9px] font-black text-indigo-400 uppercase tracking-widest relative z-10 mt-1">Tier Ranking A+</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Operational Center (Main Column) -->
            <div class="lg:col-span-3 space-y-12">
                <!-- Financial Exposure Overview -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white/5 border border-white/10 p-10 rounded-[4rem] backdrop-blur-3xl group shadow-2xl relative overflow-hidden">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-emerald-600/10 blur-[50px] rounded-full group-hover:bg-emerald-600/30 transition-all"></div>
                        <p class="text-[9px] font-black text-slate-600 uppercase tracking-[0.5em] italic mb-4">Total Liquidity Deployed</p>
                        <h4 class="text-3xl font-black text-white italic italic tracking-tighter">₹{{ number_format($client->total_borrowed) }}</h4>
                    </div>
                    <div class="bg-white/5 border border-white/10 p-10 rounded-[4rem] backdrop-blur-3xl group shadow-2xl relative overflow-hidden border-l-4 border-l-rose-500/50">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-rose-600/10 blur-[50px] rounded-full group-hover:bg-rose-600/30 transition-all"></div>
                        <p class="text-[9px] font-black text-slate-600 uppercase tracking-[0.5em] italic mb-4">Current Asset Liability</p>
                        <h4 class="text-3xl font-black text-white italic italic tracking-tighter">₹{{ number_format($client->balance) }}</h4>
                    </div>
                    <div class="bg-indigo-600/10 border border-indigo-600/30 p-10 rounded-[4rem] backdrop-blur-3xl group shadow-2xl relative overflow-hidden">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-600/10 blur-[50px] rounded-full group-hover:bg-indigo-600/30 transition-all"></div>
                        <p class="text-[9px] font-black text-indigo-400 uppercase tracking-[0.5em] italic mb-4">Cumulative Settlements</p>
                        <h4 class="text-3xl font-black text-white italic italic tracking-tighter">₹{{ number_format($client->total_paid) }}</h4>
                    </div>
                </div>

                <!-- Artifact Vault (Documents) -->
                <div class="bg-white/5 border border-white/10 rounded-[4rem] backdrop-blur-3xl overflow-hidden shadow-2xl relative">
                    <div class="p-12 pb-6 border-b border-white/5 flex items-center justify-between">
                         <div>
                            <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-1">Entity Artifact Vault</h3>
                            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Validated Institutional Documentation Registry</p>
                         </div>
                         <i class="fas fa-lock text-slate-700 text-2xl"></i>
                    </div>
                    <div class="p-12">
                         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                             @forelse($client->documents as $doc)
                             <div class="group/doc bg-black/40 border border-white/5 rounded-3xl p-8 hover:bg-slate-900 transition-all shadow-xl hover:border-indigo-500/20 translate-y-0 hover:-translate-y-2 relative overflow-hidden">
                                 <div class="absolute -top-12 -right-12 w-24 h-24 bg-indigo-600/10 blur-[40px] rounded-full group-hover/doc:bg-indigo-600/30 transition-all"></div>
                                 <div class="flex items-center space-x-6 relative z-10">
                                     <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center text-slate-600 group-hover/doc:bg-indigo-600 group-hover/doc:text-white transition-all shadow-inner">
                                         <i class="fas fa-{{ in_array($doc->document_type, ['jpg','png','jpeg']) ? 'image' : 'file-pdf' }} text-2xl"></i>
                                     </div>
                                     <div class="flex-1 min-w-0">
                                         <p class="text-[10px] font-black text-white uppercase italic tracking-tighter truncate mb-1">{{ $doc->document_name }}</p>
                                         <p class="text-[9px] text-slate-600 font-bold uppercase tracking-widest">{{ $doc->document_type }} Artifact</p>
                                     </div>
                                 </div>
                                 <div class="mt-8 flex items-center justify-between relative z-10">
                                     <a href="{{ Storage::url($doc->file_path) }}" target="_blank" class="text-[9px] font-black text-indigo-400 hover:text-indigo-300 uppercase tracking-widest italic bg-indigo-500/10 px-4 py-2 rounded-lg border border-indigo-500/10">View Artifact</a>
                                     <i class="fas fa-circle-check text-emerald-500 text-xs opacity-60"></i>
                                 </div>
                             </div>
                             @empty
                             <div class="col-span-full py-20 bg-black/40 rounded-3xl border border-dashed border-white/5 text-center">
                                 <i class="fas fa-file-excel text-4xl text-slate-900 mb-6 opacity-20"></i>
                                 <p class="text-[10px] font-black text-slate-700 uppercase tracking-[0.4em] italic uppercase">No Compliance Artifacts Found</p>
                             </div>
                             @endforelse
                         </div>
                    </div>
                </div>

                <!-- Transaction Ledger (Mini Table) -->
                <div class="bg-white/5 border border-white/10 rounded-[4rem] backdrop-blur-3xl overflow-hidden shadow-2xl relative">
                    <div class="p-12 pb-6 border-b border-white/5">
                        <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-1">Entity Transactional History</h3>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Double-Entry Journal Stream for Protocol PID-{{ 1000 + $client->id }}</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-slate-600 text-[9px] font-black uppercase tracking-[0.4em] bg-black/20">
                                <tr>
                                    <th class="py-10 px-12">Timestamp</th>
                                    <th class="py-10 px-6">Event Context</th>
                                    <th class="py-10 px-6 text-center">Protocol ID</th>
                                    <th class="py-10 px-6 text-right">Delta (Settlement)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/[0.02]">
                                @forelse($client->transactions as $tx)
                                <tr class="group hover:bg-white/5 transition-all">
                                    <td class="py-10 px-12 tabular-nums text-[10px] font-black text-slate-400 italic">25 MAR 2026 - {{ $tx->created_at->format('H:i') }}</td>
                                    <td class="py-10 px-6 text-[11px] font-black text-white uppercase italic tracking-tighter">Settlement via {{ $tx->payment_method }}</td>
                                    <td class="py-10 px-6 text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest">TXN-{{ $tx->id }}</td>
                                    <td class="py-10 px-6 text-right font-black text-emerald-400 text-sm italic font-mono">+₹{{ number_format($tx->amount) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-32 text-center text-slate-700 font-black uppercase tracking-[0.4em] text-[10px] italic">No Protocol Deltas Detected for this Entity.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
