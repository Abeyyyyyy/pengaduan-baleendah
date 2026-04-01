<x-app-layout>
    <x-slot name="title">Dashboard Wakil RT</x-slot>

    <div class="mb-8">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Wakil RT — Komplek Baleendah</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Pengaduan Masuk</p>
            <p class="text-3xl font-bold mt-1" style="color: #112D4E;">0</p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Bulan ini</p>
        </div>
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Pengaduan Diproses</p>
            <p class="text-3xl font-bold mt-1" style="color: #112D4E;">0</p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Bulan ini</p>
        </div>
    </div>

    <div class="rounded-2xl p-6 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
        <h3 class="font-semibold mb-3" style="color: #112D4E;">📌 Akses Wakil RT</h3>
        <ul class="space-y-2 text-sm" style="color: #3F72AF;">
            <li>✅ Melihat pengaduan warga</li>
            <li>✅ Membantu proses pengaduan</li>
            <li>❌ Tidak bisa akses data keuangan</li>
        </ul>
    </div>
</x-app-layout>