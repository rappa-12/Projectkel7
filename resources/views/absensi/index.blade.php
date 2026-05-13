@extends('layouts.app')

@section('content')
<div class="mb-10">
    <h1 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Pilih Kelas</h1>
    <p class="text-gray-500">Klik pada kelas untuk mengelola data absensi siswa.</p>
</div>

<!-- Grid Daftar Kelas -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @php 
        // Ini daftar kelasnya, bisa kamu tambah atau ubah sesuai kebutuhan
        $list_kelas = ['XI PPLG 1', 'XI PPLG 2', 'XI PPLG 3', 'XI AKL 1', 'XI AKL 2']; 
    @endphp
    
    @foreach($list_kelas as $kls)
    <a href="{{ route('absensi.show', $kls) }}" class="group">
        <div class="bg-white p-8 rounded-3xl shadow-sm border-2 border-transparent hover:border-indigo-600 hover:shadow-xl hover:shadow-indigo-100 transition-all duration-300 transform group-hover:-translate-y-2 text-center">
            <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                <i class="fas fa-graduation-cap text-3xl"></i>
            </div>
            <h3 class="text-2xl font-black text-gray-800 uppercase tracking-tighter">{{ $kls }}</h3>
            <p class="text-gray-400 text-sm mt-2 font-bold uppercase tracking-widest group-hover:text-indigo-500">Buka Absensi</p>
        </div>
    </a>
    @endforeach
</div>
@endsection