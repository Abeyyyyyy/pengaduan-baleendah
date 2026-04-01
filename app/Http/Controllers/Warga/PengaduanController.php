<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\PengaduanBaruNotification;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string|min:10',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.min' => 'Deskripsi minimal 10 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        $pengaduan = Pengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'status' => 'menunggu',
        ]);

        // Kirim notifikasi ke ketua saja
        $ketua = User::where('role', 'ketua')->first();
        if ($ketua) {
            $ketua->notify(new PengaduanBaruNotification($pengaduan));
        }

        return redirect()->route('warga.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim! Pengurus RT akan segera menindaklanjuti.');
    }

    public function index()
    {
        $pengaduans = Pengaduan::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('warga.pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('warga.pengaduan.create');
    }

    public function show(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id !== auth()->id()) {
            abort(403);
        }

        return view('warga.pengaduan.show', compact('pengaduan'));
    }
}