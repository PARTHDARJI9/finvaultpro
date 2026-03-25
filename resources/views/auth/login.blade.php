<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="mb-10 text-center">
        <h1 class="text-3xl font-black text-white tracking-tighter uppercase italic">Access Terminal</h1>
        <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-2">FinVault Pro Executive Layer</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2 px-1">Institutional Identifier</label>
            <div class="relative">
                <i class="fas fa-at absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@finvault.pro" 
                    class="w-full bg-black/20 border border-white/5 rounded-2xl py-4 pl-12 pr-4 text-white placeholder-slate-700 focus:ring-2 focus:ring-indigo-500/50 outline-none transition-all font-bold">
            </div>
            @if($errors->has('email'))
                <p class="text-[10px] text-rose-500 font-bold mt-2 px-1 uppercase">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-2 px-1">
                <label for="password" class="block text-[10px] font-black uppercase tracking-widest text-slate-500">Security Key</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[9px] font-bold text-indigo-400 hover:text-indigo-300 uppercase tracking-widest underline decoration-indigo-500/30">Forgot?</a>
                @endif
            </div>
            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-600"></i>
                <input id="password" type="password" name="password" required placeholder="••••••••"
                    class="w-full bg-black/20 border border-white/5 rounded-2xl py-4 pl-12 pr-4 text-white placeholder-slate-700 focus:ring-2 focus:ring-indigo-500/50 outline-none transition-all">
            </div>
            @if($errors->has('password'))
                <p class="text-[10px] text-rose-500 font-bold mt-2 px-1 uppercase">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex items-center space-x-3 px-1">
            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 bg-black/40 border-white/5 rounded text-indigo-600 focus:ring-indigo-500/50">
            <label for="remember_me" class="text-[10px] font-bold text-slate-500 uppercase tracking-widest cursor-pointer">Persist Session</label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-indigo-600/20 text-sm uppercase tracking-[0.2em] transition-all hover:scale-[1.02] active:scale-95">
                Authenticate Protocol <i class="fas fa-arrow-right ml-2 text-xs opacity-50"></i>
            </button>
        </div>

        @if (Route::has('register'))
            <div class="text-center pt-8">
                <p class="text-[10px] text-slate-600 font-bold uppercase tracking-widest mb-2 italic">New to the ecosystem?</p>
                <a href="{{ route('register') }}" class="text-[10px] font-black text-white hover:text-indigo-400 uppercase tracking-widest transition-colors underline decoration-white/10">Request Institutional Access</a>
            </div>
        @endif
    </form>
</x-guest-layout>
