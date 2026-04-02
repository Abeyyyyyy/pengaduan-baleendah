<x-app-layout>
    <x-slot name="title">Tambah Transaksi</x-slot>

    <div class="mb-6">
        <a href="{{ route('bendahara.keuangan.index') }}"
            class="text-sm font-medium hover:underline"
            style="color: #3F72AF;">
            ← Kembali ke Laporan
        </a>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">💰 Tambah Transaksi</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Input pemasukan atau pengeluaran kas RT</p>
    </div>

    <div class="rounded-2xl p-8 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
        <form method="POST" action="{{ route('bendahara.keuangan.store') }}">
            @csrf

            {{-- Jenis --}}
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Jenis Transaksi</label>
                <select name="jenis"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="pemasukan" {{ old('jenis') == 'pemasukan' ? 'selected' : '' }}>⬆️ Pemasukan</option>
                    <option value="pengeluaran" {{ old('jenis') == 'pengeluaran' ? 'selected' : '' }}>⬇️ Pengeluaran</option>
                </select>
                @error('jenis')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Keterangan</label>
                <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                    placeholder="Contoh: Iuran warga bulan April">
                @error('keterangan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Kategori</label>
                <select name="kategori"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Iuran Warga" {{ old('kategori') == 'Iuran Warga' ? 'selected' : '' }}>💳 Iuran Warga</option>
                    <option value="Kas RT" {{ old('kategori') == 'Kas RT' ? 'selected' : '' }}>🏦 Kas RT</option>
                    <option value="Operasional" {{ old('kategori') == 'Operasional' ? 'selected' : '' }}>⚙️ Operasional</option>
                    <option value="Kebersihan" {{ old('kategori') == 'Kebersihan' ? 'selected' : '' }}>🧹 Kebersihan</option>
                    <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>🔒 Keamanan</option>
                    <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>👥 Sosial</option>
                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>📌 Lainnya</option>
                </select>
                @error('kategori')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jumlah --}}
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Jumlah (Rp)</label>
                <input type="number" name="jumlah" value="{{ old('jumlah') }}"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                    placeholder="Contoh: 500000">
                @error('jumlah')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div class="mb-8">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;">
                @error('tanggal')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl text-white text-sm font-semibold transition hover:opacity-90"
                    style="background-color: #3F72AF;">
                    Simpan Transaksi
                </button>
                <a href="{{ route('bendahara.keuangan.index') }}"
                    class="px-6 py-2.5 rounded-xl text-sm font-medium transition hover:opacity-80"
                    style="background-color: #DBE2EF; color: #112D4E;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>