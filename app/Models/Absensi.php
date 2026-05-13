<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'absensi';

    /**
     * fillable: Daftar kolom yang boleh diisi.
     * Kita butuh siswa_id untuk tahu siapa yang absen,
     * tanggal untuk tahu kapan, dan status (H/S/I/A).
     */
    protected $fillable = [
        'siswa_id',
        'tanggal',
        'status',
    ];

    /**
     * Relasi ke Model Siswa.
     * Artinya: Satu data absen ini adalah milik seorang siswa.
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
