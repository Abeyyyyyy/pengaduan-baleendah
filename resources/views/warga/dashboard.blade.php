<x-app-layout>
    <x-slot name="title">Dashboard Warga</x-slot>

    <div class="mb-8">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Warga — Komplek Baleendah</p>
    </div>

    {{-- Info Akun --}}
    <div class="rounded-2xl p-6 shadow-sm mb-6" style="background-color: #DBE2EF;">
        <h3 class="font-semibold mb-3" style="color: #112D4E;">📋 Informasi Akun</h3>
        <div class="space-y-2 text-sm" style="color: #112D4E;">
            <p><span class="font-medium">Nama:</span> {{ auth()->user()->name }}</p>
            <p><span class="font-medium">Alamat:</span> {{ auth()->user()->alamat ?? '-' }}</p>
            <p><span class="font-medium">Email:</span> {{ auth()->user()->email }}</p>
        </div>
    </div>

    {{-- Aksi Warga --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
            <div class="text-3xl mb-3">📢</div>
            <h3 class="font-semibold mb-1" style="color: #112D4E;">Pengaduan</h3>
            <p class="text-sm mb-4" style="color: #3F72AF;">Sampaikan keluhan atau masukan kamu ke pengurus RT.</p>
            <a href="#"
                class="inline-block px-4 py-2 rounded-xl text-white text-sm font-medium transition hover:opacity-90"
                style="background-color: #3F72AF;">
                Buat Pengaduan
            </a>
        </div>

        <div class="rounded-2xl p-6 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
            <div class="text-3xl mb-3">📋</div>
            <h3 class="font-semibold mb-1" style="color: #112D4E;">Pengumuman</h3>
            <p class="text-sm mb-4" style="color: #3F72AF;">Lihat pengumuman terbaru dari pengurus RT.</p>
            <a href="#"
                class="inline-block px-4 py-2 rounded-xl text-white text-sm font-medium transition hover:opacity-90"
                style="background-color: #3F72AF;">
                Lihat Pengumuman
            </a>
        </div>
    </div>

    {{-- Hak Akses --}}
    <div class="rounded-2xl p-6 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
        <h3 class="font-semibold mb-3" style="color: #112D4E;">📌 Akses Kamu sebagai Warga</h3>
        <ul class="space-y-2 text-sm" style="color: #3F72AF;">
            <li>✅ Kirim pengaduan ke pengurus RT</li>
            <li>✅ Pantau status pengaduan kamu</li>
            <li>✅ Lihat pengumuman dari RT</li>
            <li>❌ Tidak bisa akses halaman pengurus</li>
        </ul>
    </div>
</x-app-layout>