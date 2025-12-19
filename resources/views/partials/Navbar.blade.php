        <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    {{-- Logo dan Nama Toko --}}
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center transform group-hover:scale-105 transition-transform duration-200">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                                {{ config('app.name', 'Toko Online') }}
                            </span>
                        </a>
                    </div>

                    {{-- Desktop Menu - Right Side --}}
                    <div class="hidden md:flex items-center gap-4">
                        @guest
                            {{-- Menu untuk Guest (Belum Login) --}}
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors">
                                    Login
                                </a>
                            @endif
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                                    Register
                                </a>
                            @endif
                        @else
                            {{-- Menu untuk User yang Sudah Login --}}
                            <div class="relative" x-data="{ open: false }">
                                <button 
                                    @click="open = !open"
                                    @click.away="open = false"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors"
                                >
                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        @auth
                                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-indigo-600 overflow-hidden">
                                                @if(Auth::user()->avatar)
                                                    <img
                                                        src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                                        alt="{{ Auth::user()->name }}"
                                                        class="h-full w-full object-cover"
                                                    >
                                                @else
                                                    <span class="text-white font-semibold text-sm">
                                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endauth
                                    </div>
                                    <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4 text-gray-500 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                {{-- Dropdown Menu --}}
                                <div 
                                    x-show="open"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2"
                                    style="display: none;"
                                >
                                    <div class="px-4 py-2 border-b border-gray-100">
                                        <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                    </div>
                                @if(request()->routeIs('profile.edit'))
                                    <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M12 3l9 9-9 9"/>
                                            </svg>
                                            Kembali ke Home
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            Profile
                                        </div>
                                    </a>
                                @endif
                                    
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            Settings
                                        </div>
                                    </a>
                                    
                                    <div class="border-t border-gray-100 my-1"></div>
                                    
                                    <a 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors"
                                    >
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Logout
                                        </div>
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>

                    {{-- Mobile Menu Button --}}
                    <div class="flex items-center md:hidden">
                        <button 
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div 
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-1"
                class="md:hidden border-t border-gray-200 bg-white"
                style="display: none;"
            >
                <div class="px-4 py-3 space-y-2">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                                Login
                            </a>
                        @endif
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-center rounded-lg font-semibold hover:shadow-lg transition-all">
                                Register
                            </a>
                        @endif
                    @else
                        <div class="px-4 py-2 border-b border-gray-100">
                            <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        
                       <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                                Profile
                        </a>

                        
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                            Settings
                        </a>
                        
                        <a 
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                            class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                        >
                            Logout
                        </a>
                        
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>
