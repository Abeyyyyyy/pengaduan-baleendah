<?php

namespace App\Http\Controllers\Ketua;

use App\Http\Controllers\Controller;
use App\Models\User;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = User::where('role', 'warga')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ketua.data-warga', compact('wargas'));
    }
}