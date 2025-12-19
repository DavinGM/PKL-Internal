{{-- ==================== FOOTER SECTION ==================== --}}
<footer class="relative bg-gray-900 border-t border-white/5 pt-20 pb-10 overflow-hidden">
    {{-- Background Glow --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-purple-500 to-transparent opacity-50"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-600/10 rounded-full filter blur-[100px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 mb-16">
            
            {{-- Brand & Description --}}
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white tracking-tight">
                        {{ config('app.name', 'Toko Online') }}
                    </span>
                </div>
                <p class="text-gray-400 leading-relaxed max-w-sm">
                    Destinasi belanja masa depan dengan kurasi produk terbaik. Nikmati pengalaman belanja yang aman, cepat, dan transparan.
                </p>
                {{-- Social Media --}}
                <div class="flex gap-4">
                    @php $socials = ['facebook', 'instagram', 'twitter', 'youtube']; @endphp
                    @foreach($socials as $social)
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-purple-400 hover:border-purple-500/50 hover:bg-purple-500/10 transition-all duration-300">
                        <span class="sr-only">{{ ucfirst($social) }}</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            {{-- Gunakan path sesuai brand masing-masing --}}
                            <path d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.341-3.369-1.341-.454-1.152-1.11-1.459-1.11-1.459-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482C19.138 20.161 22 16.416 22 12c0-5.523-4.477-10-10-10z"/>
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Links --}}
            <div class="lg:col-span-2 space-y-6">
                <h6 class="text-white font-bold uppercase tracking-wider text-sm">Eksplorasi</h6>
                <ul class="space-y-3">
                    <li><a href="{{ route('catalog.index') }}" class="text-gray-400 hover:text-purple-400 transition-colors">Katalog Produk</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Promo Spesial</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Terpopuler</a></li>
                </ul>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <h6 class="text-white font-bold uppercase tracking-wider text-sm">Dukungan</h6>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Pusat Bantuan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Pelacakan Pesanan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Kebijakan Pengembalian</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="lg:col-span-4 space-y-6">
                <h6 class="text-white font-bold uppercase tracking-wider text-sm">Hubungi Kami</h6>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 group">
                        <div class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed">Cyber Park Steet No. 404,<br>Digital City, Indonesia</p>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-gray-400 text-sm">support@tokomodern.io</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} <span class="text-white font-semibold">{{ config('app.name') }}</span>. Crafted for the future.
            </p>
            
            {{-- Payment Partners --}}
            <div class="flex items-center gap-6 opacity-50 hover:opacity-100 transition-opacity duration-300 grayscale hover:grayscale-0">
                <span class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold">Secure Payment:</span>
                <div class="flex gap-4">
                    {{-- Ganti dengan logo asli atau ikon --}}
                    <div class="h-6 w-10 bg-white/10 rounded flex items-center justify-center text-[8px] text-white">VISA</div>
                    <div class="h-6 w-10 bg-white/10 rounded flex items-center justify-center text-[8px] text-white">G-PAY</div>
                    <div class="h-6 w-10 bg-white/10 rounded flex items-center justify-center text-[8px] text-white">OVO</div>
                </div>
            </div>
        </div>
    </div>
</footer>