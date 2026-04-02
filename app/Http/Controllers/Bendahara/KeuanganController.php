<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? now()->format('Y-m');

        $transaksis = Keuangan::whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$bulan])
            ->orderBy('tanggal', 'desc')
            ->get();

        $pemasukan   = $transaksis->where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = $transaksis->where('jenis', 'pengeluaran')->sum('jumlah');
        $saldo       = $pemasukan - $pengeluaran;

        return view('bendahara.keuangan.index', compact(
            'transaksis', 'pemasukan', 'pengeluaran', 'saldo', 'bulan'
        ));
    }

    public function create()
    {
        return view('bendahara.keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis'       => 'required|in:pemasukan,pengeluaran',
            'keterangan'  => 'required|string|max:255',
            'kategori'    => 'required|string',
            'jumlah'      => 'required|numeric|min:1',
            'tanggal'     => 'required|date',
        ], [
            'jenis.required'      => 'Jenis transaksi wajib dipilih.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'kategori.required'   => 'Kategori wajib dipilih.',
            'jumlah.required'     => 'Jumlah wajib diisi.',
            'jumlah.min'          => 'Jumlah minimal Rp 1.',
            'tanggal.required'    => 'Tanggal wajib diisi.',
        ]);

        Keuangan::create([
            'user_id'    => auth()->id(),
            'jenis'      => $request->jenis,
            'keterangan' => $request->keterangan,
            'kategori'   => $request->kategori,
            'jumlah'     => $request->jumlah,
            'tanggal'    => $request->tanggal,
        ]);

        return redirect()->route('bendahara.keuangan.index')
            ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->route('bendahara.keuangan.index')
            ->with('success', 'Transaksi berhasil dihapus!');
    }
}