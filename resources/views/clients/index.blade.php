<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-1.5 h-8 bg-indigo-600 rounded-full animate-pulse shadow-[0_0_15px_rgba(79,70,229,0.8)]"></div>
                <h2 class="font-black text-3xl text-white tracking-widest uppercase italic">Entity Registry Hub</h2>
            </div>
            <div class="flex items-center space-x-6">
                <div class="bg-indigo-500/10 border border-indigo-500/20 px-6 py-2.5 rounded-xl backdrop-blur-md">
                    <span class="text-[10px] text-indigo-400 font-black tracking-[0.3em] uppercase italic">Counterparty Database: {{ number_format($clients->count()) }} Records</span>
                </div>
                <a href="{{ route('clients.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all shadow-lg shadow-indigo-600/30">Onboard New Entity</a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-[1600px] mx-auto space-y-12 pb-12">
        <!-- Grid Matrix -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($clients as $client)
            <div class="bg-white/5 border border-white/10 rounded-[4rem] p-10 backdrop-blur-3xl relative overflow-hidden group hover:border-indigo-500/30 transition-all duration-500 hover:-translate-y-2 shadow-2xl">
                <!-- Status Light -->
                <div class="absolute top-10 right-10 flex items-center space-x-2 bg-emerald-500/10 border border-emerald-500/20 px-4 py-1.5 rounded-full">
                    <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-[8px] font-black text-emerald-400 uppercase tracking-widest">{{ $client->status }}</span>
                </div>

                <div class="flex items-start space-x-8 mb-10">
                    <div class="relative shrink-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-slate-900 to-black border border-white/5 rounded-3xl flex items-center justify-center text-white text-3xl font-black shadow-2xl group-hover:rotate-6 transition-transform">
                            {{ strtoupper(substr($client->name, 0, 1)) }}
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-indigo-600 rounded-xl border-4 border-slate-950 flex items-center justify-center text-[10px] font-black text-white italic">
                            {{ $client->credit_score }}
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-2 truncate max-w-[180px]">{{ $client->name }}</h3>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest flex items-center">
                            <i class="fas fa-fingerprint mr-2 opacity-30"></i> PID-{{ 1000 + $client->id }}
                        </p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center justify-between p-6 bg-black/40 border border-white/5 rounded-3xl shadow-inner">
                        <div>
                            <p class="text-[9px] text-slate-600 font-black uppercase tracking-widest mb-1.5">Net Liability Exposure</p>
                            <p class="text-xl font-black text-white italic tracking-tighter">₹{{ number_format($client->balance) }}</p>
                        </div>
                        <div class="text-right">
                           <p class="text-[9px] text-slate-600 font-black uppercase tracking-widest mb-1.5 font-mono italic">Tier Ranking</p>
                           <p class="text-xs font-black text-indigo-400 italic font-mono">Institutional {{ $client->credit_score > 750 ? 'A+' : 'B' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('clients.show', $client) }}" class="flex items-center justify-center bg-white/5 hover:bg-white/10 border border-white/10 py-4 rounded-2xl text-[10px] font-black text-slate-400 hover:text-white uppercase tracking-widest transition-all">
                           Open Dossier <i class="fas fa-eye ml-2 opacity-30"></i>
                        </a>
                        <a href="{{ route('clients.edit', $client) }}" class="flex items-center justify-center bg-white/5 hover:bg-white/10 border border-white/10 py-4 rounded-2xl text-[10px] font-black text-slate-400 hover:text-white uppercase tracking-widest transition-all">
                           Modify Config <i class="fas fa-gear ml-2 opacity-30"></i>
                        </a>
                    </div>
                </div>

                <!-- Abstract Decoration -->
                <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-indigo-600/5 blur-[40px] rounded-full group-hover:bg-indigo-600/20 transition-all duration-700"></div>
            </div>
            @endforeach

            <!-- Add Card Overlay (Subtle) -->
            <a href="{{ route('clients.create') }}" class="group/plus bg-black/40 border-2 border-dashed border-white/5 rounded-[4rem] flex flex-col items-center justify-center py-20 hover:border-indigo-500/30 hover:bg-white/5 transition-all duration-700 shadow-2xl active:scale-95">
                <div class="w-16 h-16 bg-white/5 rounded-3xl flex items-center justify-center text-slate-700 group-hover/plus:bg-indigo-600 group-hover/plus:text-white transition-all duration-500 shadow-2xl mb-6">
                    <i class="fas fa-plus text-2xl"></i>
                </div>
                <span class="text-[10px] font-black text-slate-700 group-hover/plus:text-indigo-400 uppercase tracking-[0.4em] italic">Protocol Initializer</span>
            </a>
        </div>
    </div>
</x-app-layout>
