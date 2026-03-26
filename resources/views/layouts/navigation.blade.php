<nav x-data="{ open: false }" class="bg-slate-900 border-b border-white/5 sticky top-0 z-50 backdrop-blur-xl">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center mr-2 shadow-lg shadow-indigo-500/50">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <span class="text-xl font-bold bg-gradient-to-r from-white to-slate-400 bg-clip-text text-transparent tracking-tight">FinVault Pro</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-slate-300 hover:text-white border-indigo-500">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <a href="{{ route('clients.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-slate-400 hover:text-slate-100 hover:border-slate-300 focus:outline-none focus:text-slate-100 focus:border-slate-300 transition duration-150 ease-in-out {{ request()->routeIs('clients.*') ? 'border-indigo-500 text-white' : '' }}">
                        {{ __('Clients') }}
                    </a>
                    <a href="{{ route('loans.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-slate-400 hover:text-slate-100 hover:border-slate-300 focus:outline-none focus:text-slate-100 focus:border-slate-300 transition duration-150 ease-in-out {{ request()->routeIs('loans.*') ? 'border-indigo-500 text-white' : '' }}">
                        {{ __('Loans') }}
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-slate-400 hover:text-slate-100 hover:border-slate-300 focus:outline-none focus:text-slate-100 focus:border-slate-300 transition duration-150 ease-in-out {{ request()->routeIs('portfolio.*') ? 'border-indigo-500 text-white' : '' }}">
                        {{ __('Portfolio') }}
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown (Simplified for Direct Open) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <button class="inline-flex items-center px-3 py-2 border border-white/5 text-sm leading-4 font-medium rounded-md text-slate-300 bg-white/5 hover:text-white focus:outline-none transition ease-in-out duration-150 backdrop-blur-md">
                    <div class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center mr-2">
                        <i class="fas fa-user-circle text-indigo-400 text-xs"></i>
                    </div>
                    <div>Executive Admin</div>
                </button>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-white/5 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-900 border-t border-white/5">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block w-full text-white hover:bg-white/5 border-indigo-500">
                {{ __('Dashboard') }}
            </x-nav-link>
            <a href="{{ route('clients.index') }}" class="block w-full py-2 px-4 text-slate-400 hover:text-white">Clients</a>
            <a href="{{ route('loans.index') }}" class="block w-full py-2 px-4 text-slate-400 hover:text-white">Loans</a>
        </div>
    </div>
</nav>
