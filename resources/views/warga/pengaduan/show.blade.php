<x-app-layout>
    <x-slot name="title">Detail Pengaduan</x-slot>

    <div class="mb-6">
        <a href="{{ route('warga.pengaduan.index') }}"
            class="text-sm font-medium hover:underline"
            style="color: #3F72AF;">
            ← Kembali ke Daftar Pengaduan
        </a>
    </div>

    <div class="rounded-2xl p-8 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">

        {{-- Status Badge --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold" style="color: #112D4E;">{{ $pengaduan->judul }}</h2>
            <span class="px-4 py-1.5 rounded-full text-sm font-semibold"
                style="background-color: {{ $pengaduan->status_color }}20; color: {{ $pengaduan->status_color }};">
                {{ $pengaduan->status_label }}
            </span>
        </div>

        {{-- Info --}}
        <div class="grid grid-cols-2 gap-4 mb-6 p-4 rounded-xl" style="background-color: #F9F7F7;">
            <div>
                <p class="text-xs font-medium" style="color: #3F72AF;">Kategori</p>
                <p class="text-sm font-semibold mt-0.5" style="color: #112D4E;">{{ $pengaduan->kategori }}</p>
            </div>
            <div>
                <p class="text-xs font-medium" style="color: #3F72AF;">Tanggal Kirim</p>
                <p class="text-sm font-semibold mt-0.5" style="color: #112D4E;">
                    {{ $pengaduan->created_at->format('d M Y, H:i') }} WIB
                </p>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-6">
            <p class="text-sm font-medium mb-2" style="color: #3F72AF;">Deskripsi</p>
            <p class="text-sm leading-relaxed" style="color: #112D4E;">{{ $pengaduan->deskripsi }}</p>
        </div>

        {{-- Foto --}}
        @if($pengaduan->foto)
            <div class="mb-6">
                <p class="text-sm font-medium mb-2" style="color: #3F72AF;">Foto Pendukung</p>
                <img src="{{ Storage::url($pengaduan->foto) }}"
                    alt="Foto Pengaduan"
                    class="rounded-xl max-w-sm w-full object-cover"
                    style="border: 1px solid #DBE2EF;">
            </div>
        @endif

        {{-- Catatan Pengurus --}}
        @if($pengaduan->catatan_pengurus)
            <div class="rounded-xl p-4" style="background-color: #DBE2EF;">
                <p class="text-sm font-medium mb-1" style="color: #112D4E;">💬 Catatan dari Pengurus RT</p>
                <p class="text-sm" style="color: #112D4E;">{{ $pengaduan->catatan_pengurus }}</p>
            </div>
        @endif
    </div>
</x-app-layout>