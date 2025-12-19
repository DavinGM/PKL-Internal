<footer class="bg-gray-900 text-gray-100 pt-12 pb-6 mt-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap gap-8">
            {{-- Brand & Description --}}
            <div class="w-full md:w-1/2 lg:w-1/4">
                <h5 class="text-white mb-3 flex items-center gap-2">
                    <!-- Icon bisa pakai SVG -->
                    {{ config('app.name', 'Toko Online') }}
                </h5>
                <p class="text-gray-400">
                    Toko online terpercaya dengan berbagai produk berkualitas.
                    Belanja mudah, aman, dan nyaman dan pastinya lengkap.
                </p>
                <div class="flex gap-3 mt-3">
                    <a href="#" class="text-gray-400 hover:text-white"><svg class="w-5 h-5">...</svg></a>
                    <a href="#" class="text-gray-400 hover:text-white"><svg class="w-5 h-5">...</svg></a>
                    <a href="#" class="text-gray-400 hover:text-white"><svg class="w-5 h-5">...</svg></a>
                    <a href="#" class="text-gray-400 hover:text-white"><svg class="w-5 h-5">...</svg></a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="w-1/2 md:w-1/4 lg:w-1/6">
                <h6 class="text-white mb-3 font-semibold">Menu</h6>
                <ul class="space-y-2">
                    <li><a href="" class="text-gray-400 hover:text-white">Katalog Produk</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Kontak</a></li>
                </ul>
            </div>

            {{-- Help --}}
            <div class="w-1/2 md:w-1/4 lg:w-1/6">
                <h6 class="text-white mb-3 font-semibold">Bantuan</h6>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Cara Belanja</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Kebijakan Privasi</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="w-full md:w-1/2 lg:w-1/4">
                <h6 class="text-white mb-3 font-semibold">Hubungi Kami</h6>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex items-center gap-2"><svg class="w-4 h-4">...</svg> Jl. Contoh No. 123, Bandung</li>
                    <li class="flex items-center gap-2"><svg class="w-4 h-4">...</svg> (022) 123-4567</li>
                    <li class="flex items-center gap-2"><svg class="w-4 h-4">...</svg> info@tokoonline.com</li>
                </ul>
            </div>
        </div>

        <hr class="my-6 border-gray-700">

        <div class="flex flex-col md:flex-row items-center justify-between">
            <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} {{ config('app.name', 'Toko Online') }}. All rights reserved.</p>
            <img src="{{ asset('images/payment-methods.png') }}" alt="Payment Methods" class="h-7 mt-3 md:mt-0">
        </div>
    </div>
</footer>
