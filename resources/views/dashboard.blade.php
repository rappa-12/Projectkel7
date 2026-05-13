@extends('layouts.app')

@section('content')
<!-- Header Bagian Atas -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Absensi</h1>
    <p class="text-sm text-gray-500 uppercase tracking-wider">Ringkasan Kehadiran Siswa SMK NEGERI 1 GARUT</p>
</div>

<!-- Breadcrumb -->
<nav class="flex mb-8 text-sm text-gray-600 italic">
    <i class="fas fa-home mt-1 mr-2"></i> Home <span class="mx-2">/</span> Dashboard
</nav>

<!-- Pesan Sukses Login -->
@if(session('success'))
    <div class="bg-indigo-100 border-l-4 border-indigo-500 p-3 mb-6 text-indigo-700 text-xs font-bold uppercase tracking-widest">
        {{ session('success') }}
    </div>
@endif

<!-- Stat Cards (Dinamis dari Controller) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    
    <!-- Card Hadir -->
    <div class="bg-indigo-600 text-white rounded-sm shadow-md flex p-0 overflow-hidden group h-32">
        <div class="bg-indigo-700 p-6 flex items-center justify-center w-1/3 group-hover:bg-indigo-800 transition">
            <i class="fas fa-user-check text-4xl opacity-50"></i>
        </div>
        <div class="p-4 flex flex-col justify-center items-end w-2/3">
            <span class="text-4xl font-bold">{{ $jumlah_hadir }}</span>
            <span class="text-xs font-semibold uppercase tracking-wider mt-1">Hadir</span>
        </div>
    </div>

    <!-- Card Sakit -->
    <div class="bg-violet-500 text-white rounded-sm shadow-md flex p-0 overflow-hidden group h-32">
        <div class="bg-violet-600 p-6 flex items-center justify-center w-1/3 group-hover:bg-violet-700 transition">
            <i class="fas fa-medkit text-4xl opacity-50"></i>
        </div>
        <div class="p-4 flex flex-col justify-center items-end w-2/3">
            <span class="text-4xl font-bold">{{ $jumlah_sakit }}</span>
            <span class="text-xs font-semibold uppercase tracking-wider mt-1">Sakit</span>
        </div>
    </div>

    <!-- Card Izin -->
    <div class="bg-purple-500 text-white rounded-sm shadow-md flex p-0 overflow-hidden group h-32">
        <div class="bg-purple-600 p-6 flex items-center justify-center w-1/3 group-hover:bg-purple-700 transition">
            <i class="fas fa-envelope text-4xl opacity-50"></i>
        </div>
        <div class="p-4 flex flex-col justify-center items-end w-2/3">
            <span class="text-4xl font-bold">{{ $jumlah_izin }}</span>
            <span class="text-xs font-semibold uppercase tracking-wider mt-1">Izin</span>
        </div>
    </div>

    <!-- Card Alpa -->
    <div class="bg-fuchsia-600 text-white rounded-sm shadow-md flex p-0 overflow-hidden group h-32">
        <div class="bg-fuchsia-700 p-6 flex items-center justify-center w-1/3 group-hover:bg-fuchsia-800 transition">
            <i class="fas fa-user-times text-4xl opacity-50"></i>
        </div>
        <div class="p-4 flex flex-col justify-center items-end w-2/3">
            <span class="text-4xl font-bold">{{ $jumlah_alpa }}</span>
            <span class="text-xs font-semibold uppercase tracking-wider mt-1">Alpa</span>
        </div>
    </div>

</div>

<!-- Info Box -->
<div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm flex items-center gap-4">
    <div class="bg-indigo-100 p-3 rounded-full">
        <i class="fas fa-info-circle text-indigo-600 text-xl"></i>
    </div>
    <div>
        <p class="text-gray-700 font-medium">
            Total Siswa Terdaftar: <span class="text-indigo-600 font-bold">{{ $total_siswa }} Siswa</span>
        </p>
        <p class="text-sm text-gray-500">
            Silahkan pilih menu <strong>Absensi</strong> di sidebar untuk mulai mencatat kehadiran hari ini.
        </p>
    </div>
</div>
@endsection