{{-- ================================================
     FILE: resources/views/admin/dashboard.blade.php
     FUNGSI: Dashboard admin dengan statistik & quick actions
     ================================================ --}}
@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">
        {{-- Total Pendapatan --}}
        <div class="bg-white shadow rounded-lg p-5 flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Pendapatan</p>
                <h3 class="text-xl font-semibold">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</h3>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <i class="bi bi-currency-dollar text-green-500 text-2xl"></i>
            </div>
        </div>

        {{-- Total Pesanan --}}
        <div class="bg-white shadow rounded-lg p-5 flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Pesanan</p>
                <h3 class="text-xl font-semibold">{{ $stats['total_orders'] }}</h3>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <i class="bi bi-bag text-blue-500 text-2xl"></i>
            </div>
        </div>

        {{-- Perlu Diproses --}}
        <div class="bg-white shadow rounded-lg p-5 flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Perlu Diproses</p>
                <h3 class="text-xl font-semibold">{{ $stats['pending_orders'] }}</h3>
            </div>
            <div class="bg-yellow-100 rounded-full p-3">
                <i class="bi bi-clock text-yellow-500 text-2xl"></i>
            </div>
        </div>

        {{-- Stok Menipis --}}
        <div class="bg-white shadow rounded-lg p-5 flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Stok Menipis</p>
                <h3 class="text-xl font-semibold">{{ $stats['low_stock'] }}</h3>
            </div>
            <div class="bg-red-100 rounded-full p-3">
                <i class="bi bi-exclamation-triangle text-red-500 text-2xl"></i>
            </div>
        </div>
    </div>

    {{-- Recent Orders & Quick Actions --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Recent Orders --}}
        <div class="lg:col-span-2 bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-between items-center px-5 py-3 border-b">
                <h5 class="font-semibold text-gray-700">Pesanan Terbaru</h5>
                <a href="{{ route('admin.orders.index') }}"
                   class="text-blue-600 hover:underline text-sm">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No. Order</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($recentOrders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:underline">
                                        #{{ $order->order_number }}
                                    </a>
                                </td>
                                <td class="px-4 py-2">{{ $order->user->name }}</td>
                                <td class="px-4 py-2">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 rounded-full text-xs text-white bg-{{ $order->status_color }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ $order->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white shadow rounded-lg p-5 flex flex-col gap-3">
            <h5 class="font-semibold text-gray-700">Aksi Cepat</h5>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded flex items-center justify-center hover:bg-blue-700">
                <i class="bi bi-plus-circle me-2"></i> Tambah Produk
            </a>
            <a href="{{ route('admin.categories.index') }}" class="border border-blue-600 text-blue-600 px-4 py-2 rounded flex items-center justify-center hover:bg-blue-50">
                <i class="bi bi-folder-plus me-2"></i> Kelola Kategori
            </a>
            <a href="{{ route('admin.reports.sales') }}" class="border border-blue-600 text-blue-600 px-4 py-2 rounded flex items-center justify-center hover:bg-blue-50">
                <i class="bi bi-file-earmark-bar-graph me-2"></i> Lihat Laporan
            </a>
        </div>
    </div>
@endsection
