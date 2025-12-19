{{-- Success Message --}}
@if(session('success'))
    <div 
        class="flex items-center justify-between bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md shadow-md mb-4"
        role="alert"
        x-data="{ show: true }"
        x-show="show"
    >
        <div class="flex items-center space-x-2">
            <!-- Icon check -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        <button @click="show = false" class="text-green-700 hover:text-green-900 font-bold">&times;</button>
    </div>
@endif

{{-- Error Message --}}
@if(session('error'))
    <div 
        class="flex items-center justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md shadow-md mb-4"
        role="alert"
        x-data="{ show: true }"
        x-show="show"
    >
        <div class="flex items-center space-x-2">
            <!-- Icon exclamation -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M5.07 19h13.86a2 2 0 002-2V7a2 2 0 00-2-2H5.07a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
        <button @click="show = false" class="text-red-700 hover:text-red-900 font-bold">&times;</button>
    </div>
@endif

{{-- Validation Errors --}}
@if($errors->any())
    <div 
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md shadow-md mb-4"
        role="alert"
        x-data="{ show: true }"
        x-show="show"
    >
        <div class="flex justify-between items-start">
            <strong class="font-bold">Terjadi kesalahan:</strong>
            <button @click="show = false" class="text-red-700 hover:text-red-900 font-bold">&times;</button>
        </div>
        <ul class="mt-2 list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
