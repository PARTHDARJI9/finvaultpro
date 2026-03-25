<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FinVault Pro') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <!-- Alpine JS -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
            .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.05); }
            
            /* Premium Core Scrollbar */
            .custom-scrollbar::-webkit-scrollbar { width: 4px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { 
                background: linear-gradient(to bottom, #4f46e5, #a855f7); 
                border-radius: 20px; 
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #6366f1; }
            
            /* Global Page Scrollbar */
            ::-webkit-scrollbar { width: 8px; }
            ::-webkit-scrollbar-track { background: #000; }
            ::-webkit-scrollbar-thumb { 
                background: #1e293b; 
                border-radius: 4px; 
                border: 2px solid #000;
            }
            ::-webkit-scrollbar-thumb:hover { background: #334155; }

            /* Strategic Media Queries for Executive Ops */
            @media (max-width: 640px) {
                h1, h2 { font-size: 1.5rem !important; letter-spacing: -0.05em !important; }
                .p-12 { padding: 1.5rem !important; }
                .p-10 { padding: 1.25rem !important; }
                .rounded-[4rem] { border-radius: 2rem !important; }
                .rounded-[3rem] { border-radius: 1.5rem !important; }
                .grid { gap: 1rem !important; }
                .space-y-12 { space-y: 2rem !important; }
            }

            @media (min-width: 1600px) {
                .max-w-executive { max-width: 1700px; margin-left: auto; margin-right: auto; }
            }

            @media (max-height: 700px) {
                nav.flex-1 { padding-top: 1rem !important; padding-bottom: 1rem !important; }
                .mb-12 { margin-bottom: 1.5rem !important; }
            }
        </style>
    </head>
    <body class="bg-black text-slate-200 antialiased overflow-hidden selection:bg-indigo-600 selection:text-white">
        
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar Navigation -->
            @include('layouts.sidebar')

            <!-- Main Content Executive Layer -->
            <div class="flex-1 flex flex-col min-w-0 bg-slate-950 overflow-y-auto overflow-x-hidden transition-all duration-300 relative group">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-600/5 blur-[120px] rounded-full -translate-y-1/2 translate-x-1/2 -z-10"></div>
                
                <!-- Page Heading (Optional but modernized) -->
                @isset($header)
                    <header class="sticky top-0 lg:top-0 z-40 bg-black/40 backdrop-blur-xl border-b border-white/5 py-4 px-8 lg:px-12 flex items-center justify-between mt-16 lg:mt-0">
                        <div class="flex-1 overflow-hidden">
                            {{ $header }}
                        </div>
                        <div class="hidden md:flex items-center space-x-6">
                            <i class="fas fa-search text-slate-600 hover:text-white transition-colors cursor-pointer"></i>
                            <i class="fas fa-bell text-slate-600 hover:text-white transition-colors cursor-pointer relative">
                                <span class="absolute -top-1 -right-1 w-2 h-2 bg-rose-500 rounded-full border border-black animate-pulse"></span>
                            </i>
                            <div class="h-6 w-px bg-white/5"></div>
                            <div class="flex items-center space-x-4">
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Institutional Access: ACTIVE</span>
                            </div>
                        </div>
                    </header>
                @endisset

                <!-- Main Section -->
                <main class="flex-1 relative z-10 px-4 md:px-8 lg:px-12">
                    <div class="py-12">
                        {{ $slot }}
                    </div>
                </main>

                <!-- Footer Terminal Info -->
                <footer class="mt-auto px-8 lg:px-12 py-6 border-t border-white/5 flex flex-col md:flex-row justify-between items-center bg-black/20 pb-24 lg:pb-6">
                    <p class="text-[9px] font-black text-slate-600 uppercase tracking-widest">© 2026 FinVault Pro Infrastructure Layer. All Assets Verified.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0 opacity-40 hover:opacity-100 transition-opacity">
                        <a href="#" class="text-[9px] font-black uppercase tracking-widest hover:text-indigo-400">Registry</a>
                        <a href="#" class="text-[9px] font-black uppercase tracking-widest hover:text-indigo-400">Ledger</a>
                        <a href="#" class="text-[9px] font-black uppercase tracking-widest hover:text-indigo-400">Compliance</a>
                    </div>
                </footer>
            </div>

            <!-- Mobile Bottom Navigation (Fixed) -->
            <div class="lg:hidden fixed bottom-0 left-0 w-full h-20 px-6 bg-slate-900 border-t border-white/5 backdrop-blur-2xl z-50 flex items-center justify-between shadow-[0_-20px_50px_rgba(0,0,0,0.5)]">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center space-y-1 transition-all {{ request()->routeIs('dashboard') ? 'text-indigo-400 scale-110' : 'text-slate-500 hover:text-white' }}">
                    <i class="fas fa-house text-lg"></i>
                    <span class="text-[8px] font-black uppercase tracking-widest">Dash</span>
                </a>
                <a href="{{ route('clients.index') }}" class="flex flex-col items-center space-y-1 transition-all {{ request()->routeIs('clients.*') ? 'text-indigo-400 scale-110' : 'text-slate-500 hover:text-white' }}">
                    <i class="fas fa-user-group text-lg"></i>
                    <span class="text-[8px] font-black uppercase tracking-widest">Clients</span>
                </a>
                <a href="{{ route('loans.index') }}" class="flex flex-col items-center space-y-1 transition-all {{ request()->routeIs('loans.*') ? 'text-indigo-400 scale-110' : 'text-slate-500 hover:text-white' }}">
                    <i class="fas fa-hand-holding-dollar text-lg"></i>
                    <span class="text-[8px] font-black uppercase tracking-widest">Loans</span>
                </a>
                <a href="{{ route('portfolio.index') }}" class="flex flex-col items-center space-y-1 transition-all {{ request()->routeIs('portfolio.*') ? 'text-indigo-400 scale-110' : 'text-slate-500 hover:text-white' }}">
                    <i class="fas fa-chart-pie text-lg"></i>
                    <span class="text-[8px] font-black uppercase tracking-widest">Assets</span>
                </a>
                <button @click="$dispatch('toggle-sidebar')" class="flex flex-col items-center space-y-1 text-slate-500 hover:text-white transition-all">
                    <i class="fas fa-grip text-lg"></i>
                    <span class="text-[8px] font-black uppercase tracking-widest">More</span>
                </button>
            </div>
        </div>

        @stack('scripts')
    </body>
</html>
