<x-app-layout>
    <x-slot name="title">Pengaduan Saya</x-slot>

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold" style="color: #112D4E;">📋 Pengaduan Saya</h2>
            <p class="text-sm mt-1" style="color: #3F72AF;">Riwayat pengaduan yang kamu kirim</p>
        </div>
        <a href="{{ route('warga.pengaduan.create') }}"
            class="px-4 py-2.5 rounded-xl text-white text-sm font-medium transition hover:opacity-90"
            style="background-color: #3F72AF;">
            + Buat Pengaduan
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl px-4 py-3 mb-6 text-sm font-medium"
            style="background-color: #D1FAE5; color: #065F46;">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($pengaduans->isEmpty())
        <div class="rounded-2xl p-12 text-center" style="background-color: white; border: 1px solid #DBE2EF;">
            <div class="text-5xl mb-4">📭</div>
            <p class="font-medium" style="color: #112D4E;">Belum ada pengaduan</p>
            <p class="text-sm mt-1 mb-6" style="color: #3F72AF;">Kamu belum pernah mengirim pengaduan</p>
            <a href="{{ route('warga.pengaduan.create') }}"
                class="inline-block px-6 py-2.5 rounded-xl text-white text-sm font-medium"
                style="background-color: #3F72AF;">
                Buat Pengaduan Pertama
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($pengaduans as $pengaduan)
                <div class="rounded-2xl p-6 shadow-sm transition hover:shadow-md"
                    style="background-color: white; border: 1px solid #DBE2EF;">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs px-2 py-0.5 rounded-full font-medium"
                                    style="background-color: #DBE2EF; color: #112D4E;">
                                    {{ $pengaduan->kategori }}
                                </span>
                            </div>
                            <h3 class="font-semibold text-base" style="color: #112D4E;">
                                {{ $pengaduan->judul }}
                            </h3>
                            <p class="text-sm mt-1 line-clamp-2" style="color: #3F72AF;">
                                {{ $pengaduan->deskripsi }}
                            </p>
                            <p class="text-xs mt-2" style="color: #3F72AF;">
                                {{ $pengaduan->created_at->format('d M Y, H:i') }} WIB
                            </p>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <span class="text-xs px-3 py-1 rounded-full font-semibold"
                                style="background-color: {{ $pengaduan->status_color }}20; color: {{ $pengaduan->status_color }};">
                                {{ $pengaduan->status_label }}
                            </span>
                            <a href="{{ route('warga.pengaduan.show', $pengaduan) }}"
                                class="text-xs font-medium hover:underline"
                                style="color: #3F72AF;">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-app-layout>