<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pengaduan Baleendah' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="background-color: #F9F7F7;">

    {{-- Sidebar --}}
    <div class="flex min-h-screen">
        <aside class="w-64 min-h-screen flex flex-col" style="background-color: #112D4E;">

            {{-- Logo --}}
            <div class="px-6 py-6 border-b border-blue-800">
                <h1 class="text-white font-bold text-lg leading-tight">🏘️ RT Baleendah</h1>
                <p class="text-xs mt-1" style="color: #DBE2EF;">Sistem Pengaduan Warga</p>
            </div>

            {{-- User Info --}}
            <div class="px-6 py-4 border-b border-blue-800">
                <p class="text-white font-semibold text-sm">{{ auth()->user()->name }}</p>
                <span class="text-xs px-2 py-0.5 rounded-full font-medium capitalize"
                    style="background-color: #3F72AF; color: #F9F7F7;">
                    {{ auth()->user()->role }}
                </span>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-4 space-y-1">
                @if(auth()->user()->role === 'ketua')
                    <a href="{{ route('ketua.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('ketua.dashboard') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('ketua.data-warga') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('ketua.data-warga') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        👥 Data Warga
                    </a>
                    <a href="{{ route('ketua.pengaduan.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('ketua.pengaduan.*') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📋 Pengaduan
                    </a>
                    <a href="{{ route('ketua.keuangan') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('ketua.keuangan') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        💰 Laporan Keuangan
                    </a>
                @endif

                @if(auth()->user()->role === 'wakil')
                    <a href="{{ route('wakil.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('wakil.dashboard') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('wakil.data-warga') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('wakil.data-warga') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        👥 Data Warga
                    </a>
                    <a href="{{ route('wakil.pengaduan.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('wakil.pengaduan.*') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📋 Pengaduan
                    </a>
                @endif

                @if(auth()->user()->role === 'bendahara')
                    <a href="{{ route('bendahara.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('bendahara.dashboard') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('bendahara.keuangan.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('bendahara.keuangan.*') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        💰 Keuangan
                    </a>
                @endif

                @if(auth()->user()->role === 'sekretaris')
                    <a href="{{ route('sekretaris.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('sekretaris.dashboard') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('sekretaris.pengaduan.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('sekretaris.pengaduan.*') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📋 Pengaduan
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition hover:bg-blue-800"
                        style="color: #DBE2EF;">
                        📢 Pengumuman
                    </a>
                @endif

                @if(auth()->user()->role === 'warga')
                    <a href="{{ route('warga.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('warga.dashboard') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('warga.pengaduan.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition"
                        style="{{ request()->routeIs('warga.pengaduan.*') ? 'background-color: #3F72AF; color: #F9F7F7;' : 'color: #DBE2EF;' }}">
                        📢 Pengaduan Saya
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition hover:bg-blue-800"
                        style="color: #DBE2EF;">
                        📋 Pengumuman
                    </a>
                @endif
            </nav>

            {{-- Logout --}}
            <div class="px-4 py-4 border-t border-blue-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition hover:bg-red-800"
                        style="color: #DBE2EF;">
                        🚪 Logout
                    </button>
                </form>
            </div>

        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>

</body>

</html>