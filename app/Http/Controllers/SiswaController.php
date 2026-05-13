<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa; 
use App\Models\Absensi;
use Carbon\Carbon;

class SiswaController extends Controller
{
    // 1. Dashboard Utama (Menghitung Statistik Real-time)
    public function index()
    {
        // Mendapatkan tanggal hari ini
        $hari_ini = Carbon::now()->format('Y-m-d');

        // Menghitung total siswa keseluruhan
        $total_siswa = Siswa::count(); 

        // Menghitung jumlah berdasarkan status di tabel absensi untuk hari ini
        $jumlah_hadir = Absensi::where('tanggal', $hari_ini)->where('status', 'hadir')->count();
        $jumlah_sakit = Absensi::where('tanggal', $hari_ini)->where('status', 'sakit')->count();
        $jumlah_izin  = Absensi::where('tanggal', $hari_ini)->where('status', 'izin')->count();
        $jumlah_alpa  = Absensi::where('tanggal', $hari_ini)->where('status', 'alpa')->count();

        // Mengirimkan semua data ke view dashboard
        return view('dashboard', compact(
            'total_siswa', 
            'jumlah_hadir', 
            'jumlah_sakit', 
            'jumlah_izin', 
            'jumlah_alpa'
        ));
    }

    // 2. Halaman Pilih Kelas (Daftar Kotak Kelas)
    public function absensi()
    {
        return view('absensi.index');
    }

    // 3. Tabel Siswa Per Kelas (Halaman untuk Input Absen)
    public function showKelas(string $kelas) 
    {
        $data_siswa = Siswa::where('kelas', $kelas)->get();
        return view('absensi.show', compact('data_siswa', 'kelas'));
    }

    // 4. Form Tambah Siswa Baru
    public function create()
    {
        return view('siswa.create');
    }

    // 5. Proses Simpan Siswa Baru
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas,nisn',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        Siswa::create($request->all());
        
        return redirect()->route('absensi.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    // 6. Form Edit Profil Siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    // 7. Proses Update Data Siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('absensi.show', $siswa->kelas)->with('success', 'Data siswa berhasil diperbarui!');
    }

    // 8. Proses Hapus Siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = $siswa->kelas;
        $siswa->delete();

        return redirect()->route('absensi.show', $kelas)->with('success', 'Siswa berhasil dihapus!');
    }

    // 9. Proses Simpan/Update Absensi Harian (Logika Utama Absensi)
    public function simpanAbsen(Request $request)
    {
        if (!$request->has('absen')) {
            return back()->with('error', 'Tidak ada data absen yang dikirim.');
        }

        $tanggal_hari_ini = Carbon::now()->format('Y-m-d');

        foreach ($request->absen as $siswa_id => $status) {
            Absensi::updateOrCreate(
                [
                    'siswa_id' => $siswa_id,
                    'tanggal'  => $tanggal_hari_ini
                ],
                ['status' => $status]
            );
        }

        return back()->with('success', 'Absensi hari ini berhasil disimpan!');
    }

    // 10. Halaman Rekap Absensi
    public function rekapKelas(string $kelas)
    {
        $data_siswa = Siswa::where('kelas', $kelas)->get();
        return view('absensi.rekap', compact('data_siswa', 'kelas'));
    }

    // 11. Proses Login Admin
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if($request->email == "admin@smk.id" && $request->password == "admin123") {
            session(['is_login' => true]);
            return redirect()->route('dashboard')->with('success', 'Selamat Datang Admin!');
        }

        return back()->with('error', 'Email atau Password salah!')->withInput();
    }
}