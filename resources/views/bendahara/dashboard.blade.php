<x-app-layout>
    <x-slot name="title">Dashboard Bendahara RT</x-slot>

    <div class="mb-8">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Bendahara RT — Komplek Baleendah</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Total Pemasukan</p>
            <p class="text-2xl font-bold mt-1" style="color: #10B981;">
                Rp {{ number_format($pemasukan, 0, ',', '.') }}
            </p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Semua waktu</p>
        </div>
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Total Pengeluaran</p>
            <p class="text-2xl font-bold mt-1" style="color: #EF4444;">
                Rp {{ number_format($pengeluaran, 0, ',', '.') }}
            </p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Semua waktu</p>
        </div>
        <div class="rounded-2xl p-6 shadow-sm" style="background-color: #DBE2EF;">
            <p class="text-sm font-medium" style="color: #3F72AF;">Saldo Kas</p>
            <p class="text-2xl font-bold mt-1" style="color: #112D4E;">
                Rp {{ number_format($saldo, 0, ',', '.') }}
            </p>
            <p class="text-xs mt-2" style="color: #3F72AF;">Saat ini</p>
        </div>
    </div>

    <div class="rounded-2xl p-6 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
        <h3 class="font-semibold mb-3" style="color: #112D4E;">📌 Akses Bendahara RT</h3>
        <ul class="space-y-2 text-sm" style="color: #3F72AF;">
            <li>✅ Input pemasukan & pengeluaran</li>
            <li>✅ Lihat laporan keuangan</li>
            <li>✅ Export laporan ke PDF/Excel</li>
            <li>❌ Tidak bisa akses data warga</li>
        </ul>
    </div>
</x-app-layout>