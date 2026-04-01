<x-app-layout>
    <x-slot name="title">Data Warga — Ketua RT</x-slot>

    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">👥 Data Warga Terdaftar</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Daftar seluruh warga yang sudah mendaftar di sistem</p>
    </div>

    {{-- Stats --}}
    <div class="rounded-2xl p-6 shadow-sm mb-6" style="background-color: #DBE2EF;">
        <p class="text-sm font-medium" style="color: #3F72AF;">Total Warga Terdaftar</p>
        <p class="text-4xl font-bold mt-1" style="color: #112D4E;">{{ $wargas->count() }}</p>
    </div>

    {{-- Tabel --}}
    <div class="rounded-2xl shadow-sm overflow-hidden" style="background-color: white; border: 1px solid #DBE2EF;">

        {{-- Table Header --}}
        <div class="px-6 py-4 border-b" style="border-color: #DBE2EF;">
            <h3 class="font-semibold" style="color: #112D4E;">Daftar Warga</h3>
        </div>

        @if($wargas->isEmpty())
            <div class="px-6 py-12 text-center">
                <div class="text-5xl mb-4">👤</div>
                <p class="font-medium" style="color: #112D4E;">Belum ada warga terdaftar</p>
                <p class="text-sm mt-1" style="color: #3F72AF;">Warga yang sudah register akan muncul di sini</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr style="background-color: #F9F7F7;">
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">No</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Nama</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Email</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Alamat</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Tanggal Daftar</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wargas as $index => $warga)
                            <tr class="border-t transition hover:opacity-80"
                                style="border-color: #DBE2EF;">
                                <td class="px-6 py-4" style="color: #3F72AF;">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium" style="color: #112D4E;">
                                    {{ $warga->name }}
                                </td>
                                <td class="px-6 py-4" style="color: #3F72AF;">
                                    {{ $warga->email }}
                                </td>
                                <td class="px-6 py-4" style="color: #3F72AF;">
                                    {{ $warga->alamat ?? '-' }}
                                </td>
                                <td class="px-6 py-4" style="color: #3F72AF;">
                                    {{ $warga->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium"
                                        style="background-color: #DBE2EF; color: #112D4E;">
                                        Aktif
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>