<x-app-layout>
    <x-slot name="title">Buat Pengaduan</x-slot>

    <div class="mb-6">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">📢 Buat Pengaduan</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Sampaikan keluhan atau masukan kamu ke pengurus RT</p>
    </div>

    <div class="rounded-2xl p-8 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
        <form method="POST" action="{{ route('warga.pengaduan.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Judul Pengaduan</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                    placeholder="Contoh: Jalan berlubang di depan blok B">
                @error('judul')
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
                    <option value="Infrastruktur" {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>🏗️ Infrastruktur</option>
                    <option value="Kebersihan" {{ old('kategori') == 'Kebersihan' ? 'selected' : '' }}>🧹 Kebersihan</option>
                    <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>🔒 Keamanan</option>
                    <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>👥 Sosial</option>
                    <option value="Administrasi" {{ old('kategori') == 'Administrasi' ? 'selected' : '' }}>📄 Administrasi</option>
                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>📌 Lainnya</option>
                </select>
                @error('kategori')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-5">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Deskripsi</label>
                <textarea name="deskripsi" rows="5"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none resize-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                    placeholder="Jelaskan pengaduan kamu secara detail...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto --}}
            <div class="mb-8">
                <label class="block text-sm font-medium mb-1" style="color: #112D4E;">
                    Foto Pendukung <span style="color: #3F72AF;">(opsional, maks. 2MB)</span>
                </label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none"
                    style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;">
                @error('foto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl text-white text-sm font-semibold transition hover:opacity-90"
                    style="background-color: #3F72AF;">
                    Kirim Pengaduan
                </button>
                <a href="{{ route('warga.pengaduan.index') }}"
                    class="px-6 py-2.5 rounded-xl text-sm font-medium transition hover:opacity-80"
                    style="background-color: #DBE2EF; color: #112D4E;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>