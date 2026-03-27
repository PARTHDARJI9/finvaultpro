<div x-data="{ 
    mobileOpen: false, 
    activeDropdown: '' 
}" @toggle-sidebar.window="mobileOpen = !mobileOpen" class="relative z-50 lg:z-auto h-screen flex">
    
    <!-- Mobile Hamburger (outside sidebar) -->
    <div class="lg:hidden fixed top-0 left-0 w-full h-16 px-6 bg-slate-950/90 backdrop-blur-2xl border-b border-white/5 flex items-center justify-between z-[60]">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-600/30">
                <i class="fas fa-vault text-white text-lg"></i>
            </div>
            <span class="text-xl font-black text-white italic tracking-tighter uppercase leading-none">FinVault <span class="text-indigo-500">Pro</span></span>
        </div>
        <button @click="mobileOpen = !mobileOpen" class="text-slate-400 hover:text-white transition-all p-2 bg-white/5 rounded-xl border border-white/10 active:scale-90">
            <i class="fas fa-bars-staggered text-xl"></i>
        </button>
    </div>

    <!-- Backdrop for mobile -->
    <div x-show="mobileOpen" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileOpen = false" 
         class="fixed inset-0 bg-black/95 backdrop-blur-3xl lg:hidden z-[55]"></div>

    <!-- Sidebar Container -->
    <aside :class="mobileOpen ? 'translate-x-0' : '-translate-x-full'" 
           class="fixed inset-y-0 left-0 w-80 bg-slate-950 border-r border-white/5 flex flex-col z-[70] lg:static lg:translate-x-0 transition-transform duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] shadow-[20px_0_60px_rgba(0,0,0,0.5)]">
        
        <!-- Branding Header -->
        <div class="p-8 pb-6 shrink-0 relative overflow-hidden">
            <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-600/10 blur-[60px] rounded-full"></div>
            
            <a href="{{ route('dashboard') }}" class="group flex items-center space-x-5 mb-12 relative z-10 transition-transform active:scale-95">
                <div class="relative">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl flex items-center justify-center shadow-[0_10px_30px_rgba(79,70,229,0.4)] group-hover:shadow-[0_15px_40px_rgba(79,70,229,0.6)] group-hover:-rotate-6 transition-all duration-500">
                        <i class="fas fa-shield-halved text-white text-2xl"></i>
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-500 rounded-full border-[3px] border-slate-950 shadow-lg shadow-emerald-500/20"></div>
                </div>
                <div>
                    <h1 class="text-3xl font-black text-white tracking-tighter uppercase italic leading-none">FinVault <span class="text-indigo-500">Pro</span></h1>
                    <p class="text-[9px] text-slate-500 font-black uppercase tracking-[0.4em] mt-2 opacity-50 flex items-center">
                        <span class="w-2 h-2 bg-indigo-500/30 rounded-full mr-2"></span> System Protocol 1.0
                    </p>
                </div>
            </a>

            <!-- Global Search Protocol -->
            <div class="relative group/search">
                <div class="absolute inset-0 bg-indigo-600/5 blur-sm opacity-0 group-focus-within/search:opacity-100 transition-opacity rounded-2xl"></div>
                <div class="relative flex items-center bg-black/60 border border-white/5 group-focus-within/search:border-indigo-500/30 rounded-2xl px-5 py-4 transition-all">
                    <i class="fas fa-search text-slate-600 mr-4 text-sm group-focus-within/search:text-indigo-400"></i>
                    <input type="text" placeholder="Access Protocol..." 
                        class="bg-transparent border-none p-0 text-xs font-bold text-white placeholder-slate-800 outline-none w-full focus:ring-0">
                    <div class="text-[8px] font-black text-slate-700 uppercase tracking-widest bg-white/5 px-2 py-1 rounded-md border border-white/5">CMD+K</div>
                </div>
            </div>
        </div>

        <!-- Navigation Matrix -->
        <nav class="flex-1 px-6 pt-8 pb-12 space-y-4 overflow-y-auto custom-scrollbar overflow-x-hidden selection:bg-indigo-500/30">
            <p class="px-6 text-[9px] text-slate-600 font-black uppercase tracking-[0.5em] mb-8 opacity-40">Primary Systems</p>
            
            @php
                $navItems = [
                    ['route' => 'dashboard', 'label' => 'Executive Desk', 'icon' => 'gauge-high', 'color' => 'indigo'],
                    ['route' => 'clients.index', 'pattern' => 'clients.*', 'label' => 'Entity Registry', 'icon' => 'user-group', 'color' => 'indigo'],
                    ['route' => 'loans.index', 'pattern' => 'loans.*', 'label' => 'Capital Assets', 'icon' => 'sack-dollar', 'color' => 'indigo'],
                    ['route' => 'portfolio.index', 'label' => 'Strategic Assets', 'icon' => 'briefcase', 'color' => 'indigo'],
                ];
            @endphp

            @foreach($navItems as $item)
                @php $isActive = request()->routeIs($item['pattern'] ?? $item['route']); @endphp
                <a href="{{ route($item['route']) }}" 
                   class="relative group/nav flex items-center justify-between py-4 px-6 rounded-2xl transition-all duration-300 {{ $isActive ? 'bg-indigo-600 text-white shadow-[0_15px_45px_rgba(79,70,229,0.35)] translate-x-1'  : 'text-slate-500 hover:bg-white/5 hover:text-slate-200 border border-transparent hover:border-white/5' }}">
                    <div class="flex items-center space-x-5 pointer-events-none">
                        <i class="fas fa-{{ $item['icon'] }} text-lg {{ $isActive ? 'text-white' : 'text-slate-600 group-hover/nav:text-indigo-400' }} transition-colors w-6 text-center"></i>
                        <span class="font-black text-[11px] tracking-tight uppercase italic">{{ $item['label'] }}</span>
                    </div>
                    @if(!$isActive) <i class="fas fa-arrow-right text-[10px] opacity-0 group-hover/nav:opacity-40 group-hover/nav:translate-x-1 transition-all"></i> @endif
                </a>
            @endforeach

            <div class="pt-12">
                <p class="px-6 text-[9px] text-slate-600 font-black uppercase tracking-[0.5em] mb-8 opacity-40">Financial Controls</p>
                
                @php
                    $controlItems = [
                        ['route' => 'accounting.index', 'label' => 'Institutional Ledger', 'icon' => 'calculator', 'color' => 'indigo'],
                        ['route' => 'reports.index', 'label' => 'Strategic Intelligence', 'icon' => 'file-invoice-dollar', 'color' => 'indigo'],
                        ['route' => 'compliance.index', 'label' => 'Security Protocol', 'icon' => 'shield-halved', 'color' => 'rose'],
                    ];
                @endphp

                @foreach($controlItems as $item)
                    @php $isActive = request()->routeIs($item['route']); @endphp
                    <a href="{{ route($item['route']) }}" 
                       class="relative group/nav flex items-center py-4 px-6 rounded-2xl transition-all mb-4 {{ $isActive ? 'bg-white/10 text-white shadow-xl translate-x-1 border border-white/10' : 'text-slate-500 hover:bg-white/5 hover:text-slate-200 border border-transparent hover:border-white/10' }}">
                        <i class="fas fa-{{ $item['icon'] }} mr-5 {{ $isActive ? 'text-'.$item['color'].'-500' : 'text-slate-600 group-hover/nav:text-'.$item['color'].'-400' }} transition-colors text-lg w-6 text-center"></i>
                        <span class="font-black text-[11px] tracking-tight uppercase italic whitespace-nowrap">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </nav>

        <!-- Institutional Signature Footer -->
        <div class="p-5 lg:p-8 shrink-0 bg-black/40 backdrop-blur-3xl border-t border-white/5 relative group/footer mt-auto h-[90px] lg:h-[120px] flex items-center mb-20 lg:mb-0">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-600/5 to-transparent pointer-events-none"></div>
            
            <div class="w-full relative bg-white/5 border border-white/5 rounded-[2.2rem] p-5 hover:bg-white/10 transition-all duration-500 shadow-2xl flex items-center justify-between">
                <div class="flex items-center space-x-4 overflow-hidden">
                    <div class="relative shrink-0">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl flex items-center justify-center text-white text-xl font-black italic shadow-2xl">
                            {{ strtoupper(substr(Auth::user()?->name ?? 'Guest', 0, 1)) }}
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 {{ Auth::check() ? 'bg-emerald-500' : 'bg-slate-600' }} rounded-full border-[3px] border-slate-950 {{ Auth::check() ? 'animate-pulse' : '' }}"></div>
                    </div>
                    <div class="truncate">
                        <p class="text-[11px] font-black text-white truncate uppercase italic tracking-tighter mb-0.5">{{ Auth::user()?->name ?? 'Institutional Guest' }}</p>
                        <p class="text-[9px] text-slate-600 font-bold uppercase tracking-widest flex items-center">
                            <span class="w-1.5 h-1.5 {{ Auth::check() ? 'bg-indigo-500' : 'bg-slate-700' }} rounded-full mr-1.5 scale-75"></span> {{ Auth::check() ? 'Licensed Director' : 'Public Access' }}
                        </p>
                    </div>
                </div>
                
                <div class="shrink-0 w-12 h-12 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-center text-slate-700 shadow-inner">
                    <i class="fas fa-microchip text-sm opacity-20"></i>
                </div>
            </div>
        </div>
    </aside>
</div>
