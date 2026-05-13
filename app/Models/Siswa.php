<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;


    protected $fillable = [
        'nisn',
        'nama',
        'kelas',
        'jenis_kelamin', 
        'alamat',
    ];

   
    public $timestamps = true;

    public function absensi() {
    return $this->hasMany(Absensi::class);
}
}
