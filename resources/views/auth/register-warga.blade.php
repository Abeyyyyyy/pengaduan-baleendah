<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Warga — RT Baleendah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center py-10" style="background-color: #F9F7F7;">
    <div class="w-full max-w-md px-6">

        {{-- Header --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold" style="color: #112D4E;">🏘️ RT Baleendah</h1>
            <p class="text-sm mt-2" style="color: #3F72AF;">Daftar sebagai Warga Komplek</p>
        </div>

        {{-- Card --}}
        <div class="rounded-2xl shadow-md p-8" style="background-color: white; border: 1px solid #DBE2EF;">
            <h2 class="text-xl font-bold mb-6" style="color: #112D4E;">Buat Akun Warga</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nama --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">
                        Nama Kepala Keluarga
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none transition focus:ring-2"
                        style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                        placeholder="Nama lengkap kamu">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">
                        Alamat / No. Rumah
                    </label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}"
                        class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none transition focus:ring-2"
                        style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                        placeholder="Contoh: Blok A No. 12">
                    @error('alamat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none transition focus:ring-2"
                        style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                        placeholder="email@kamu.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">
                        Password
                    </label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none transition focus:ring-2"
                        style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                        placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">
                        Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-2.5 rounded-xl border text-sm outline-none transition focus:ring-2"
                        style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;"
                        placeholder="Ulangi password kamu">
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90"
                    style="background-color: #3F72AF;">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center text-sm mt-4" style="color: #3F72AF;">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold hover:underline" style="color: #112D4E;">
                    Login di sini
                </a>
            </p>
        </div>

    </div>
</body>
</html>