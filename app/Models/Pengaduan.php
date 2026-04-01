<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'deskripsi',
        'foto',
        'status',
        'catatan_pengurus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'menunggu'  => '⏳ Menunggu',
            'diproses'  => '🔄 Diproses',
            'selesai'   => '✅ Selesai',
            'ditolak'   => '❌ Ditolak',
            default     => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'menunggu'  => '#F59E0B',
            'diproses'  => '#3F72AF',
            'selesai'   => '#10B981',
            'ditolak'   => '#EF4444',
            default     => '#3F72AF',
        };
    }
}