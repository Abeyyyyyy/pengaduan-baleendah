<x-app-layout>
    <x-slot name="title">Daftar Pengaduan</x-slot>

    <div class="mb-6">
        <h2 class="text-2xl font-bold" style="color: #112D4E;">📋 Daftar Pengaduan Warga</h2>
        <p class="text-sm mt-1" style="color: #3F72AF;">Kelola semua pengaduan yang masuk dari warga</p>
    </div>

    @if(session('success'))
        <div class="rounded-xl px-4 py-3 mb-6 text-sm font-medium"
            style="background-color: #D1FAE5; color: #065F46;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Stats --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        @foreach([
            ['label' => 'Total', 'value' => $stats['total'], 'color' => '#112D4E'],
            ['label' => 'Menunggu', 'value' => $stats['menunggu'], 'color' => '#F59E0B'],
            ['label' => 'Diproses', 'value' => $stats['diproses'], 'color' => '#3F72AF'],
            ['label' => 'Selesai', 'value' => $stats['selesai'], 'color' => '#10B981'],
        ] as $stat)
            <div class="rounded-2xl p-4 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
                <p class="text-xs font-medium" style="color: #3F72AF;">{{ $stat['label'] }}</p>
                <p class="text-2xl font-bold mt-1" style="color: {{ $stat['color'] }};">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Tabel --}}
    <div class="rounded-2xl shadow-sm overflow-hidden" style="background-color: white; border: 1px solid #DBE2EF;">
        @if($pengaduans->isEmpty())
            <div class="px-6 py-12 text-center">
                <div class="text-5xl mb-4">📭</div>
                <p class="font-medium" style="color: #112D4E;">Belum ada pengaduan masuk</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr style="background-color: #F9F7F7;">
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">No</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Warga</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Judul</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Kategori</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Tanggal</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Status</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduans as $index => $pengaduan)
                            <tr class="border-t" style="border-color: #DBE2EF;">
                                <td class="px-6 py-4" style="color: #3F72AF;">{{ $index + 1 }}</td>
                                <td class="px-6 py-4" style="color: #112D4E;">
                                    <p class="font-medium">{{ $pengaduan->user->name }}</p>
                                    <p class="text-xs" style="color: #3F72AF;">{{ $pengaduan->user->alamat }}</p>
                                </td>
                                <td class="px-6 py-4 font-medium" style="color: #112D4E;">{{ $pengaduan->judul }}</td>
                                <td class="px-6 py-4" style="color: #3F72AF;">{{ $pengaduan->kategori }}</td>
                                <td class="px-6 py-4" style="color: #3F72AF;">{{ $pengaduan->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold"
                                        style="background-color: {{ $pengaduan->status_color }}20; color: {{ $pengaduan->status_color }};">
                                        {{ $pengaduan->status_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $role = auth()->user()->role;
                                        $showRoute = $role . '.pengaduan.show';
                                    @endphp
                                    <a href="{{ route($showRoute, $pengaduan) }}"
                                        class="text-xs font-medium hover:underline"
                                        style="color: #3F72AF;">
                                        Lihat →
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>