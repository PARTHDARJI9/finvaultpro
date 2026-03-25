<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-1.5 h-8 bg-indigo-600 rounded-full animate-pulse"></div>
                <h2 class="font-black text-3xl text-white tracking-widest uppercase italic">Institutional Ledger</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-indigo-500/10 border border-indigo-500/20 px-6 py-2 rounded-xl backdrop-blur-md">
                    <span class="text-[10px] text-indigo-400 font-black tracking-widest uppercase">Fiscal Year 2026-27</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-[1600px] mx-auto space-y-12">
        <!-- High-Level Financial Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] backdrop-blur-xl relative overflow-hidden group">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-600/10 blur-[50px] rounded-full group-hover:bg-indigo-600/20 transition-all"></div>
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-4">Total Assets Under Management</p>
                <h3 class="text-3xl font-black text-white italic">₹12.48Cr</h3>
                <div class="mt-6 flex items-center text-emerald-500">
                    <i class="fas fa-caret-up mr-2"></i>
                    <span class="text-[10px] font-black uppercase tracking-widest">+14.2% Growth</span>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] backdrop-blur-xl relative overflow-hidden group">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-4">Institutional Liabilities</p>
                <h3 class="text-3xl font-black text-white italic">₹3.12Cr</h3>
                <div class="mt-6 flex items-center text-rose-500">
                    <i class="fas fa-caret-up mr-2"></i>
                    <span class="text-[10px] font-black uppercase tracking-widest">Planned Amortization</span>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] backdrop-blur-xl relative overflow-hidden group">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-4">Operational Cash Flow</p>
                <h3 class="text-3xl font-black text-emerald-400 italic">₹84.50L</h3>
                <div class="mt-6 flex items-center text-emerald-500">
                    <i class="fas fa-check-circle mr-2 opacity-50"></i>
                    <span class="text-[10px] font-black uppercase tracking-widest">High Liquidity</span>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] backdrop-blur-xl relative overflow-hidden group">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-4">Retained Earnings</p>
                <h3 class="text-3xl font-black text-indigo-400 italic">₹1.85Cr</h3>
                <div class="mt-6 flex items-center text-slate-600">
                    <i class="fas fa-shield-alt mr-2 opacity-30"></i>
                    <span class="text-[10px] font-black uppercase tracking-widest">Reserves Initialized</span>
                </div>
            </div>
        </div>

        <!-- Ledger Terminal -->
        <div class="bg-white/5 border border-white/10 rounded-[3rem] overflow-hidden backdrop-blur-2xl shadow-2xl relative">
            <div class="bg-white/5 border-b border-white/10 p-10 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-black text-white italic tracking-tighter uppercase mb-2">Live Journal Entries</h3>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Real-time Double Entry Audit Stream</p>
                </div>
                <div class="flex space-x-4">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest transition-all shadow-lg shadow-indigo-600/20">New Ledger Item</button>
                    <button class="bg-white/5 border border-white/10 text-slate-400 px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:text-white transition-all">Trial Balance</button>
                </div>
            </div>

            <div class="p-4 overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em] border-b border-white/5">
                            <th class="px-8 py-8">Timestamp</th>
                            <th class="px-8 py-8">Transaction ID</th>
                            <th class="px-8 py-8">Ledger Account</th>
                            <th class="px-8 py-8 text-center text-indigo-400 italic">Debit</th>
                            <th class="px-8 py-8 text-center text-emerald-400 italic">Credit</th>
                            <th class="px-8 py-8 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/[0.03]">
                        <!-- Sample Rows -->
                        <tr class="group hover:bg-white/5 transition-all text-sm font-bold">
                            <td class="px-8 py-10 text-slate-400 tabular-nums">25 MAR 2026 - 16:40</td>
                            <td class="px-8 py-10 font-black italic text-white tracking-widest">TXN-9021-X</td>
                            <td class="px-8 py-10 text-slate-300">Loan Disbursement: Client Alex</td>
                            <td class="px-8 py-10 text-center text-slate-500">—</td>
                            <td class="px-8 py-10 text-center text-emerald-400 italic">₹5,00,000.00</td>
                            <td class="px-8 py-10 text-right">
                                <span class="bg-emerald-500/10 text-emerald-500 py-2 px-4 rounded-lg text-[9px] font-black uppercase tracking-widest border border-emerald-500/20">POSTED</span>
                            </td>
                        </tr>
                        <tr class="group hover:bg-white/5 transition-all text-sm font-bold">
                            <td class="px-8 py-10 text-slate-400 tabular-nums">25 MAR 2026 - 15:12</td>
                            <td class="px-8 py-10 font-black italic text-white tracking-widest">TXN-4482-B</td>
                            <td class="px-8 py-10 text-slate-300">Interest Accrual: ID #8892</td>
                            <td class="px-8 py-10 text-center text-indigo-400 italic">₹12,450.00</td>
                            <td class="px-8 py-10 text-center text-slate-500">—</td>
                            <td class="px-8 py-10 text-right">
                                <span class="bg-indigo-500/10 text-indigo-500 py-2 px-4 rounded-lg text-[9px] font-black uppercase tracking-widest border border-indigo-500/20">VALUED</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="p-10 bg-black/40 text-center">
                <p class="text-[9px] font-black text-slate-700 uppercase tracking-[0.5em] italic">Full Ledger Audit Trail Encrypted via Protocol Alpha-9</p>
            </div>
        </div>
    </div>
</x-app-layout>
