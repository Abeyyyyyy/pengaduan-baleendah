<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — RT Baleendah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex" style="background-color: #F9F7F7;">

    {{-- Left Panel --}}
    <div class="hidden lg:flex w-1/2 flex-col justify-between p-12" style="background-color: #112D4E;">
        <div>
            <h1 class="text-white text-3xl font-bold">🏘️ RT Baleendah</h1>
            <p class="mt-2 text-sm" style="color: #DBE2EF;">Sistem Pengaduan Masyarakat</p>
        </div>
        <div>
            <h2 class="text-white text-4xl font-bold leading-snug">
                Suara Warga,<br>
                <span style="color: #3F72AF;">Tanggung Jawab</span><br>
                Pengurus RT.
            </h2>
            <p class="mt-4 text-sm leading-relaxed" style="color: #DBE2EF;">
                Platform digital untuk menyampaikan pengaduan, memantau status, dan mengelola administrasi RT secara transparan.
            </p>
        </div>
        <div class="flex gap-6 text-sm" style="color: #DBE2EF;">
            <div>
                <p class="text-2xl font-bold text-white">5</p>
                <p>Role Pengguna</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">100%</p>
                <p>Transparan</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">24/7</p>
                <p>Bisa Diakses</p>
            </div>
        </div>
    </div>

    {{-- Right Panel --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">

            {{-- Mobile Logo --}}
            <div class="lg:hidden text-center mb-8">
                <h1 class="text-2xl font-bold" style="color: #112D4E;">🏘️ RT Baleendah</h1>
                <p class="text-sm mt-1" style="color: #3F72AF;">Sistem Pengaduan Masyarakat</p>
            </div>

            <h2 class="text-2xl font-bold mb-2" style="color: #112D4E;">Selamat Datang!</h2>
            <p class="text-sm mb-8" style="color: #3F72AF;">Masuk ke akun kamu untuk melanjutkan</p>

            {{-- Session Status --}}
            @if(session('status'))
                <div class="rounded-xl px-4 py-3 mb-6 text-sm" style="background-color: #D1FAE5; color: #065F46;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" autofocus
                        class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition"
                        style="border-color: #DBE2EF; background-color: white; color: #112D4E;"
                        placeholder="email@kamu.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium mb-1" style="color: #112D4E;">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition"
                        style="border-color: #DBE2EF; background-color: white; color: #112D4E;"
                        placeholder="Password kamu">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center gap-2 text-sm" style="color: #3F72AF;">
                        <input type="checkbox" name="remember" class="rounded">
                        Ingat saya
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90"
                    style="background-color: #3F72AF;">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm mt-6" style="color: #3F72AF;">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold hover:underline" style="color: #112D4E;">
                    Daftar sebagai Warga
                </a>
            </p>

            {{-- Info --}}
            <div class="mt-8 p-4 rounded-xl text-xs" style="background-color: #DBE2EF; color: #3F72AF;">
                💡 <strong style="color: #112D4E;">Pengurus RT?</strong>
                Akun sudah disiapkan oleh admin. Hubungi ketua RT jika belum punya akun.
            </div>

        </div>
    </div>

</body>
</html>