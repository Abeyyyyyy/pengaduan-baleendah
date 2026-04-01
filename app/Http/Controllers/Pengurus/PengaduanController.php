<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Notifications\StatusPengaduanNotification;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => $pengaduans->count(),
            'menunggu' => $pengaduans->where('status', 'menunggu')->count(),
            'diproses' => $pengaduans->where('status', 'diproses')->count(),
            'selesai' => $pengaduans->where('status', 'selesai')->count(),
        ];

        return view('pengurus.pengaduan.index', compact('pengaduans', 'stats'));
    }

    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load('user');
        return view('pengurus.pengaduan.show', compact('pengaduan'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,ditolak',
            'catatan_pengurus' => 'nullable|string|max:500',
        ]);

        $pengaduan->update([
            'status' => $request->status,
            'catatan_pengurus' => $request->catatan_pengurus,
        ]);

        // Kirim notifikasi ke warga
        $pengaduan->user->notify(new StatusPengaduanNotification($pengaduan));

        $role = auth()->user()->role;
        return redirect()->route($role . '.pengaduan.show', $pengaduan)
            ->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}