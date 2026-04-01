<x-app-layout>
    <x-slot name="title">Dashboard Ketua RT</x-slot>

    <div class="mb-8">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Ketua RT — Komplek Baleendah</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Total Warga</p>
            <p class="text-3xl font-bold mt-1" style="color: #112D4E;">0</p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Terdaftar di sistem</p>
        </div>
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Pengaduan Masuk</p>
            <p class="text-3xl font-bold mt-1" style="color: #112D4E;">0</p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Bulan ini</p>
        </div>
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Pengaduan Selesai</p>
            <p class="text-3xl font-bold mt-1" style="color: #112D4E;">0</p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Bulan ini</p>
        </div>
    </div>

    {{-- Info --}}
    <div class="rounded-2xl p-6 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
        <h3 class="font-semibold mb-3" style="color: #112D4E;">📌 Akses Ketua RT</h3>
        <ul class="space-y-2 text-sm" style="color: #3F72AF;">
            <li>✅ Melihat & monitoring data warga</li>
            <li>✅ Melihat semua pengaduan</li>
            <li>✅ Update status pengaduan</li>
            <li>✅ Melihat laporan keuangan</li>
        </ul>
    </div>
</x-app-layout>