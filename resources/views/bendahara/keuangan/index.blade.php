<x-app-layout>
    <x-slot name="title">Laporan Keuangan</x-slot>

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold" style="color: #112D4E;">💰 Laporan Keuangan</h2>
            <p class="text-sm mt-1" style="color: #3F72AF;">Rekap keuangan RT Baleendah</p>
        </div>
        <a href="{{ route('bendahara.keuangan.create') }}"
            class="px-4 py-2.5 rounded-xl text-white text-sm font-medium transition hover:opacity-90"
            style="background-color: #3F72AF;">
            + Tambah Transaksi
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl px-4 py-3 mb-6 text-sm font-medium"
            style="background-color: #D1FAE5; color: #065F46;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Filter Bulan --}}
    <div class="rounded-2xl p-4 mb-6 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
        <form method="GET" action="{{ route('bendahara.keuangan.index') }}" class="flex items-center gap-3">
            <label class="text-sm font-medium" style="color: #112D4E;">Filter Bulan:</label>
            <input type="month" name="bulan" value="{{ $bulan }}"
                class="px-4 py-2 rounded-xl border text-sm outline-none"
                style="border-color: #DBE2EF; background-color: #F9F7F7; color: #112D4E;">
            <button type="submit"
                class="px-4 py-2 rounded-xl text-white text-sm font-medium"
                style="background-color: #3F72AF;">
                Tampilkan
            </button>
        </form>
    </div>

    {{-- Stats Bulan Ini --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="rounded-2xl p-5 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
            <p class="text-xs font-medium" style="color: #3F72AF;">Pemasukan Bulan Ini</p>
            <p class="text-xl font-bold mt-1" style="color: #10B981;">
                Rp {{ number_format($pemasukan, 0, ',', '.') }}
            </p>
        </div>
        <div class="rounded-2xl p-5 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
            <p class="text-xs font-medium" style="color: #3F72AF;">Pengeluaran Bulan Ini</p>
            <p class="text-xl font-bold mt-1" style="color: #EF4444;">
                Rp {{ number_format($pengeluaran, 0, ',', '.') }}
            </p>
        </div>
        <div class="rounded-2xl p-5 shadow-sm" style="background-color: white; border: 1px solid #DBE2EF;">
            <p class="text-xs font-medium" style="color: #3F72AF;">Saldo Bulan Ini</p>
            <p class="text-xl font-bold mt-1" style="color: #112D4E;">
                Rp {{ number_format($saldo, 0, ',', '.') }}
            </p>
        </div>
    </div>

    {{-- Tabel Transaksi --}}
    <div class="rounded-2xl shadow-sm overflow-hidden" style="background-color: white; border: 1px solid #DBE2EF;">
        <div class="px-6 py-4 border-b" style="border-color: #DBE2EF;">
            <h3 class="font-semibold" style="color: #112D4E;">Riwayat Transaksi</h3>
        </div>

        @if($transaksis->isEmpty())
            <div class="px-6 py-12 text-center">
                <div class="text-5xl mb-4">📭</div>
                <p class="font-medium" style="color: #112D4E;">Belum ada transaksi bulan ini</p>
                <p class="text-sm mt-1" style="color: #3F72AF;">Tambahkan transaksi pertama kamu</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr style="background-color: #F9F7F7;">
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Tanggal</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Keterangan</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Kategori</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Jenis</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Jumlah</th>
                            <th class="px-6 py-3 text-left font-semibold" style="color: #112D4E;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksis as $transaksi)
                            <tr class="border-t" style="border-color: #DBE2EF;">
                                <td class="px-6 py-4" style="color: #3F72AF;">
                                    {{ $transaksi->tanggal->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 font-medium" style="color: #112D4E;">
                                    {{ $transaksi->keterangan }}
                                </td>
                                <td class="px-6 py-4" style="color: #3F72AF;">
                                    {{ $transaksi->kategori }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold"
                                        style="background-color: {{ $transaksi->jenis == 'pemasukan' ? '#D1FAE5' : '#FEE2E2' }};
                                               color: {{ $transaksi->jenis == 'pemasukan' ? '#065F46' : '#991B1B' }};">
                                        {{ $transaksi->jenis == 'pemasukan' ? '⬆️ Pemasukan' : '⬇️ Pengeluaran' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-semibold"
                                    style="color: {{ $transaksi->jenis == 'pemasukan' ? '#10B981' : '#EF4444' }};">
                                    {{ $transaksi->jumlah_format }}
                                </td>
                                <td class="px-6 py-4">
                                    <form method="POST"
                                        action="{{ route('bendahara.keuangan.destroy', $transaksi) }}"
                                        onsubmit="return confirm('Yakin hapus transaksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-xs font-medium hover:underline"
                                            style="color: #EF4444;">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>