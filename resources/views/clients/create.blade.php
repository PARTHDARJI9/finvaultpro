<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-1.5 h-8 bg-indigo-600 rounded-full animate-pulse"></div>
                <h2 class="font-black text-3xl text-white tracking-widest uppercase italic">Onboard Entity</h2>
            </div>
            <span class="text-[10px] text-indigo-400 font-black tracking-[0.3em] uppercase bg-indigo-500/5 px-4 py-2 rounded-xl border border-indigo-500/10">Security Protocol Alpha-9</span>
        </div>
    </x-slot>

    <div class="py-12 px-4 max-w-6xl mx-auto min-h-screen">
        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left Column: Core Identity -->
                <div class="lg:col-span-7 space-y-12">
                    <div class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl shadow-[0_0_100px_rgba(0,0,0,0.5)] relative overflow-hidden group">
                        <div class="absolute -top-24 -right-24 w-80 h-80 bg-indigo-600/10 blur-[120px] rounded-full group-hover:bg-indigo-600/20 transition-all duration-700"></div>
                        
                        <h3 class="text-xs font-black text-indigo-400 uppercase tracking-[0.4em] mb-12 flex items-center">
                            <i class="fas fa-fingerprint mr-4 text-lg"></i> Entity Identification
                        </h3>

                        <div class="space-y-10">
                            <!-- Floating Label Input: Custom ID (Read Only) -->
                            <div class="relative group/input opacity-80 cursor-not-allowed">
                                <label class="absolute -top-3.5 left-6 bg-slate-950 px-2 text-[10px] font-black text-indigo-400 uppercase tracking-widest">Protocol ID (Autoshow)</label>
                                <input type="text" value="{{ $customId }}" readonly 
                                    class="w-full bg-black/60 border border-indigo-500/20 rounded-[2rem] py-5 px-8 text-indigo-400 text-lg font-black outline-none cursor-not-allowed italic">
                            </div>

                            <!-- Floating Label Input: Name -->
                            <div class="relative group/input">
                                <label class="absolute -top-3.5 left-6 bg-slate-950 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest transition-all group-focus-within/input:text-indigo-400">Legal Full Name</label>
                                <input type="text" name="name" required placeholder="Alexander Pierce Enterprise" 
                                    class="w-full bg-black/40 border border-white/5 rounded-[2rem] py-5 px-8 text-white text-lg font-bold outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500/50 transition-all">
                            </div>

                            <!-- Floating Label Input: Address -->
                            <div class="relative group/input">
                                <label class="absolute -top-3.5 left-6 bg-slate-950 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest transition-all group-focus-within/input:text-indigo-400">Institutional Address</label>
                                <textarea name="address" required placeholder="Industrial Hub, Sector 4, Executive Plaza" rows="2"
                                    class="w-full bg-black/40 border border-white/5 rounded-[2rem] py-5 px-8 text-white font-bold outline-none focus:ring-1 focus:ring-indigo-500 transition-all resize-none"></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <!-- Email -->
                                <div class="relative group/input">
                                    <label class="absolute -top-3.5 left-6 bg-slate-950 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Mail Protocol</label>
                                    <input type="email" name="email" required placeholder="ceo@entity.com" 
                                        class="w-full bg-black/40 border border-white/5 rounded-[2rem] py-5 px-8 text-white font-bold outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
                                </div>
                                <!-- Phone -->
                                <div class="relative group/input">
                                    <label class="absolute -top-3.5 left-6 bg-slate-950 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Relay Number</label>
                                    <input type="text" name="phone" required placeholder="+91 XXXXX XXXXX" 
                                        class="w-full bg-black/40 border border-white/5 rounded-[2rem] py-5 px-8 text-white font-bold outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <!-- Aadhaar -->
                                <div class="relative group/input">
                                    <label class="absolute -top-3.5 left-6 bg-slate-950 px-2 text-[10px] font-black text-rose-400 uppercase tracking-widest transition-all group-focus-within/input:text-rose-400">Aadhaar Matrix ID</label>
                                    <input type="text" name="aadhaar_no" required maxlength="12" placeholder="XXXX XXXX XXXX" 
                                        class="w-full bg-black/40 border border-white/5 rounded-[2rem] py-5 px-8 text-white font-bold outline-none focus:ring-1 focus:ring-rose-500/50 transition-all">
                                </div>
                                <!-- PAN -->
                                <div class="relative group/input">
                                    <label class="absolute -top-3.5 left-6 bg-slate-950 px-2 text-[10px] font-black text-amber-400 uppercase tracking-widest transition-all group-focus-within/input:text-amber-400">PAN Protocol</label>
                                    <input type="text" name="pan_no" required maxlength="10" placeholder="ABCDE1234F" 
                                        class="w-full bg-black/40 border border-white/5 rounded-[2rem] py-5 px-8 text-white font-bold outline-none focus:ring-1 focus:ring-amber-500/50 transition-all uppercase">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cycle & Validity -->
                    <div x-data="{ 
                        startDate: '{{ date('Y-m-d') }}',
                        tenure: 365,
                        get endDate() {
                            if (!this.startDate) return '';
                            let date = new Date(this.startDate);
                            date.setDate(date.getDate() + parseInt(this.tenure || 0));
                            return date.toISOString().split('T')[0];
                        }
                    }" class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl shadow-2xl relative overflow-hidden group">
                        <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-fuchsia-600/10 blur-[120px] rounded-full group-hover:bg-fuchsia-600/20 transition-all duration-700"></div>
                        
                        <h3 class="text-xs font-black text-fuchsia-400 uppercase tracking-[0.4em] mb-12 flex items-center">
                            <i class="fas fa-calendar-check mr-4 text-lg"></i> Operational Lifecycle
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
                            <!-- Engagement Start -->
                            <div class="relative min-w-0">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4 block ml-4">Engagement Start</label>
                                <div class="bg-black/60 border border-white/10 rounded-2xl flex items-center px-4 py-2 hover:border-indigo-500/30 transition-all shadow-inner">
                                    <input type="date" name="start_date" required x-model="startDate"
                                        class="w-full bg-transparent border-none text-white font-black text-sm outline-none focus:ring-0 color-scheme-dark p-2">
                                </div>
                            </div>

                            <!-- Validity Tenure -->
                            <div class="relative min-w-0">
                                <label class="text-[10px] font-black text-indigo-400 uppercase tracking-widest mb-4 block ml-4 text-center">Validity (Days)</label>
                                <div class="bg-black/60 border border-white/10 rounded-2xl flex items-center px-4 py-2 hover:border-indigo-500/30 transition-all shadow-inner">
                                    <input type="number" x-model="tenure" placeholder="365"
                                        class="w-full bg-transparent border-none text-white font-black text-center text-sm outline-none focus:ring-0 p-2">
                                </div>
                            </div>

                            <!-- Calculated Expiry -->
                            <div class="relative min-w-0">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-4 block ml-4">Institutional Expiry</label>
                                <div class="bg-black/60 border border-white/10 rounded-2xl flex items-center px-4 py-2 opacity-60 shadow-inner">
                                    <input type="date" name="end_date" x-model="endDate" readonly
                                        class="w-full bg-transparent border-none text-slate-400 font-black text-sm outline-none focus:ring-0 color-scheme-dark p-2 cursor-not-allowed">
                                </div>
                            </div>
                        </div>
                        <p class="mt-8 text-[10px] text-slate-600 font-black uppercase tracking-widest italic ml-6">Smart Engine: Automatic lifecycle calculation based on institutional policy.</p>
                    </div>
                </div>

                <!-- Right Column: Compliance & Upload -->
                <div class="lg:col-span-5 space-y-12">
                    <div x-data="{ 
                        files: [],
                        handleFiles(event) {
                            this.files = Array.from(event.target.files).map(file => {
                                return {
                                    name: file.name,
                                    size: (file.size / 1024).toFixed(1) + ' KB',
                                    type: file.type,
                                    preview: file.type.startsWith('image/') ? URL.createObjectURL(file) : null
                                };
                            });
                        },
                        clearFiles() {
                            this.files = [];
                            document.getElementById('docUpload').value = '';
                        }
                    }" class="bg-white/5 border border-white/10 p-10 rounded-[3rem] backdrop-blur-3xl shadow-2xl relative overflow-hidden h-full flex flex-col">
                        <h3 class="text-xs font-black text-emerald-400 uppercase tracking-[0.4em] mb-8 flex items-center shrink-0">
                            <i class="fas fa-cloud-upload-alt mr-4 text-lg"></i> Compliance Vault
                        </h3>

                        <!-- Master Interaction Zone -->
                        <div class="flex-1 flex flex-col min-h-0 bg-black/40 border-2 border-dashed border-white/10 rounded-[2.5rem] p-6 transition-all hover:border-emerald-500/30 overflow-hidden relative group/vault">
                            <input type="file" x-ref="fileInput" name="documents[]" multiple class="hidden" id="docUpload" @change="handleFiles($event)">
                            
                            <!-- Empty Phase -->
                            <div x-show="files.length === 0" class="flex-1 flex flex-col items-center justify-center text-center cursor-pointer h-full" @click="$refs.fileInput.click()">
                                <div class="w-20 h-20 bg-emerald-500/10 rounded-3xl flex items-center justify-center mb-6 group-hover/vault:scale-110 transition-transform shadow-2xl shadow-emerald-500/10">
                                    <i class="fas fa-file-shield text-3xl text-emerald-500"></i>
                                </div>
                                <h4 class="text-white font-black text-sm uppercase tracking-[0.2em] mb-2">Stage Institutional Artifacts</h4>
                                <p class="text-[9px] text-slate-500 font-bold uppercase tracking-widest">Support: PDF, JPG, PNG (Multi-Upload Active)</p>
                            </div>

                            <!-- Staged Phase (Small Cards) -->
                            <div x-show="files.length > 0" class="h-full flex flex-col" x-cloak>
                                <div class="flex items-center justify-between mb-6 shrink-0">
                                    <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest bg-emerald-500/10 px-3 py-1.5 rounded-lg border border-emerald-500/20">
                                        Vault: <span x-text="files.length"></span> Documents Ready
                                    </span>
                                    <button type="button" @click="clearFiles()" class="text-[9px] font-black text-rose-500 uppercase tracking-widest hover:underline px-2">Purge All</button>
                                </div>

                                <div class="flex-1 overflow-y-auto custom-scrollbar pr-2 grid grid-cols-1 gap-3 pb-4">
                                    <template x-for="(file, index) in files" :key="index">
                                        <div class="bg-slate-900/80 border border-white/5 p-4 rounded-2xl flex items-center space-x-4 group/card hover:border-indigo-500/30 transition-all shadow-lg animate-fade-in">
                                            <!-- Mini Card Thumbnail -->
                                            <div class="w-12 h-12 bg-black rounded-xl border border-white/5 flex items-center justify-center overflow-hidden shrink-0 group-hover/card:scale-105 transition-transform shadow-inner">
                                                <template x-if="file.preview">
                                                    <img :src="file.preview" class="w-full h-full object-cover">
                                                </template>
                                                <template x-if="!file.preview">
                                                    <i class="fas fa-file-invoice text-indigo-500/50"></i>
                                                </template>
                                            </div>
                                            <!-- Artifact Metadata -->
                                            <div class="min-w-0">
                                                <p class="text-[11px] font-black text-slate-100 truncate uppercase tracking-tighter" x-text="file.name"></p>
                                                <div class="flex items-center space-x-3 mt-1">
                                                    <span class="text-[8px] font-black text-slate-600 uppercase tracking-widest" x-text="file.size"></span>
                                                    <span class="w-1 h-1 bg-slate-700 rounded-full"></span>
                                                    <span class="text-[8px] font-black text-emerald-500 uppercase tracking-widest">VERIFIED TYPE</span>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <button type="button" @click="$refs.fileInput.click()" class="mt-4 py-3 bg-white/5 hover:bg-white/10 text-[9px] font-black text-white uppercase tracking-widest rounded-xl transition-all border border-white/5">
                                    + Add More Artifacts
                                </button>
                            </div>
                        </div>

                        <div class="space-y-6 shrink-0 mt-8">
                            <div class="relative group/input">
                                <label class="absolute -top-3 left-6 bg-slate-950 px-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Initial Member Status</label>
                                <select name="status" class="w-full bg-black/40 border border-white/5 rounded-2xl py-4 px-8 text-white font-bold appearance-none outline-none focus:ring-1 focus:ring-indigo-500 transition-all cursor-pointer">
                                    <option value="active" class="bg-slate-900">ACTIVE PRIME</option>
                                    <option value="pending" class="bg-slate-900">PENDING CLEARANCE</option>
                                    <option value="blocklisted" class="bg-slate-900">SECURITY FLAG</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full py-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-[2rem] shadow-[0_15px_40px_rgba(79,70,229,0.4)] font-black text-sm uppercase tracking-[0.3em] transition-all hover:scale-[1.02] active:scale-95 flex items-center justify-center">
                                Confirm Onboarding <i class="fas fa-bolt ml-4 text-amber-400"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <style>
        .color-scheme-dark { color-scheme: dark; }
    </style>
</x-app-layout>
