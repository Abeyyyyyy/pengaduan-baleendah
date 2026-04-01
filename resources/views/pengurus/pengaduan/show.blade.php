<x-app-layout>
    <x-slot name="title">Detail Pengaduan</x-slot>

    @php $role = auth()->user()->role; @endphp

    <div class="mb-6">
        <a href="{{ route($role . '.pengaduan.index') }}"
            class="text-sm font-medium hover:underline"
            style="color: #3F72AF;">
            ← Kembali ke Daftar Pengaduan
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Detail Pengaduan --}}
        <div class="lg:col-span-2 rounded-2xl p-8 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold" style="color: #112D4E;">{{ $pengaduan->judul }}</h2>
                <span class="px-4 py-1.5 rounded-full text-sm font-semibold"
                    style="background-color: {{ $pengaduan->status_color }}20; color: {{ $pengaduan->status_color }};">
                    {{ $pengaduan->status_label }}
                </span>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6 p-4 rounded-xl" style="background-color: #F9F7F7;">
                <div>
                    <p class="text-xs font-medium" style="color: #3F72AF;">Nama Warga</p>
                    <p class="text-sm font-semibold mt-0.5" style="color: #112D4E;">{{ $pengaduan->user->name }}</p>
                </div>
                <div>
                    <p class="text-xs font-medium" style="color: #3F72AF;">Alamat</p>
                    <p class="text-sm font-semibold mt-0.5" style="color: #112D4E;">{{ $pengaduan->user->alamat ?? '-' }}</p>
                </div>
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

            <div class="mb-6">
                <p class="text-sm font-medium mb-2" style="color: #3F72AF;">Deskripsi</p>
                <p class="text-sm leading-relaxed" style="color: #112D4E;">{{ $pengaduan->deskripsi }}</p>
            </div>

            @if($pengaduan->foto)
                <div>
                    <p class="text-sm font-medium mb-2" style="color: #3F72AF;">Foto Pendukung</p>
                    <img src="{{ Storage::url($pengaduan->foto) }}"
                        alt="Foto Pengaduan"
                        class="rounded-xl max-w-sm w-full object-cover"
                        style="border: 1px solid #DBE2EF;">
                </div>
            @endif
        </div>

        {{-- Update Status --}}
        <div class="rounded-2xl p-6 shadow-sm h-fit" style="background-color: white; border: 1px solid #DBE2EF;">
            <h3 class="font-semibold mb-4" style="color: #112D4E;">🔄 Update Status</h3>

            <form method="POST" action="{{ route($role . '.pengaduan.status', $pengaduan) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Status</label>
                    <select name="status"
                        class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                        style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;">
                        <option value="menunggu" {{ $pengaduan->status == 'menunggu' ? 'selected' : '' }}>⏳ Menunggu</option>
                        <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                        <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                        <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">
                        Catatan <span style="color: #3F72AF;">(opsional)</span>
                    </label>
                    <textarea name="catatan_pengurus" rows="4"
                        class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none resize-none"
                        style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                        placeholder="Tambahkan catatan untuk warga...">{{ $pengaduan->catatan_pengurus }}</textarea>
                </div>

                <button type="submit"
                    class="w-full py-2.5 rounded-xl text-white text-sm font-semibold transition hover:opacity-90"
                    style="background-color: #3F72AF;">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>