@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800 uppercase tracking-widest">Tambah Siswa Baru</h1>
        <p class="text-sm text-gray-500">Masukkan data siswa untuk didaftarkan ke dalam sistem absensi.</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
        <form action="{{ route('siswa.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NISN -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase">NISN Siswa</label>
                    <input type="text" name="nisn" placeholder="Contoh: 12345678" 
                        class="w-full p-3 bg-gray-50 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:outline-none transition" required>
                </div>

                <!-- Nama -->
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase">Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama siswa" 
                        class="w-full p-3 bg-gray-50 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:outline-none transition" required>
                </div>

                <!-- Kelas (Penting: Samakan dengan list di halaman Absensi) -->
                <div class="space-y-2 md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase">Pilih Kelas</label>
                    <select name="kelas" class="w-full p-3 bg-gray-50 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:outline-none transition" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="XI PPLG 1">XI PPLG 1</option>
                        <option value="XI PPLG 2">XI PPLG 2</option>
                        <option value="XI PPLG 3">XI PPLG 3</option>
                        <option value="XI AKL 1">XI AKL 1</option>
                        <option value="XI AKL 2">XI AKL 2</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 pt-6">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-3 rounded-lg font-bold shadow-indigo-200 shadow-lg transition-all">
                    SIMPAN DATA
                </button>
                <a href="{{ route('absensi.index') }}" class="text-gray-500 hover:text-gray-700 font-semibold px-6 py-3 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection