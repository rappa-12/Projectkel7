@extends('layouts.app')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Kelas {{ $kelas }}</h1>
        <p class="text-sm text-gray-500">Manajemen absensi harian — {{ date('d F Y') }}</p>
    </div>
    
    <div class="flex gap-3">
        <a href="{{ route('siswa.create') }}" class="bg-indigo-100 text-indigo-700 hover:bg-indigo-200 px-4 py-2 rounded-lg font-bold transition flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>
        <a href="{{ route('absensi.rekap', $kelas) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-bold shadow-lg transition flex items-center gap-2">
            <i class="fas fa-file-export"></i> Rekap Absen
        </a>
    </div>
</div>

{{-- Pesan Sukses --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold uppercase text-xs tracking-widest">
        {{ session('success') }}
    </div>
@endif

<!-- Form Absensi Harian -->
<form action="{{ route('absensi.simpan') }}" method="POST">
    @csrf
    <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="p-4 text-center w-16 text-xs font-bold text-gray-400 uppercase">No</th>
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase">NISN</th>
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase">Nama Siswa</th>
                    <th class="p-4 text-center text-xs font-bold text-gray-400 uppercase italic">Status Hari Ini</th>
                    <th class="p-4 text-center text-xs font-bold text-gray-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($data_siswa as $key => $s)
                <tr class="hover:bg-indigo-50/50 transition">
                    <td class="p-4 text-center text-gray-500 font-medium">{{ $key + 1 }}</td>
                    <td class="p-4 font-mono text-sm text-indigo-600 font-bold">{{ $s->nisn }}</td>
                    <td class="p-4 font-semibold uppercase text-gray-800">{{ $s->nama }}</td>
                    <td class="p-4 text-center">
                        {{-- Logika untuk menampilkan status yang sudah tersimpan --}}
                        @php 
                            $absen_hari_ini = $s->absensi()->where('tanggal', date('Y-m-d'))->first();
                            $status_skrg = $absen_hari_ini ? $absen_hari_ini->status : 'hadir';
                        @endphp
                        
                        <select name="absen[{{ $s->id }}]" class="text-[10px] font-black border-2 {{ $status_skrg != 'hadir' ? 'border-orange-200 bg-orange-50' : 'border-gray-100' }} rounded-lg p-2 focus:ring-2 focus:ring-indigo-400 outline-none cursor-pointer">
                            <option value="hadir" {{ $status_skrg == 'hadir' ? 'selected' : '' }}>HADIR</option>
                            <option value="sakit" {{ $status_skrg == 'sakit' ? 'selected' : '' }}>SAKIT</option>
                            <option value="izin" {{ $status_skrg == 'izin' ? 'selected' : '' }}>IZIN</option>
                            <option value="alpa" {{ $status_skrg == 'alpa' ? 'selected' : '' }}>ALPA</option>
                        </select>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-4">
                            {{-- Fitur Edit Profil Siswa --}}
                            <a href="{{ route('siswa.edit', $s->id) }}" class="text-gray-300 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="text-gray-300 hover:text-red-500 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-gray-400 font-bold uppercase tracking-widest text-sm">Belum ada data siswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($data_siswa->count() > 0)
    <div class="mt-6 flex justify-end">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-10 py-4 rounded-2xl font-black shadow-xl shadow-green-100 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-sm">
            <i class="fas fa-check-circle mr-2"></i> Simpan Absensi Hari Ini
        </button>
    </div>
    @endif
</form>
@endsection