{{-- Success Message --}}
@if(session('success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-[-20px]"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        class="relative mb-6 group"
    >
        {{-- Glow Effect --}}
        <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
        
        <div class="relative flex items-center justify-between bg-gray-900/60 backdrop-blur-xl border border-green-500/30 text-green-400 px-6 py-4 rounded-2xl shadow-2xl">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-green-500/20 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="font-medium tracking-wide">{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="text-green-500/50 hover:text-green-400 transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
@endif

{{-- Error & Validation Messages --}}
@if(session('error') || $errors->any())
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-[-20px]"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        class="relative mb-6 group"
    >
        {{-- Glow Effect Red --}}
        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-600 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
        
        <div class="relative bg-gray-900/60 backdrop-blur-xl border border-red-500/30 text-red-400 px-6 py-4 rounded-2xl shadow-2xl">
            <div class="flex justify-between items-start">
                <div class="flex items-start space-x-3">
                    <div class="p-2 bg-red-500/20 rounded-lg mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <strong class="block font-bold text-lg mb-1 tracking-tight">Terjadi Masalah</strong>
                        @if(session('error'))
                            <p class="text-red-400/90">{{ session('error') }}</p>
                        @endif
                        
                        @if($errors->any())
                            <ul class="mt-2 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li class="flex items-center gap-2 text-sm text-red-400/80">
                                        <span class="w-1 h-1 bg-red-500 rounded-full"></span>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <button @click="show = false" class="text-red-500/50 hover:text-red-400 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
    </div>
@endif