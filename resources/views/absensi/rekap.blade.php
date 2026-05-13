@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Rekap Absensi: {{ $kelas }}</h1>
        <p class="text-sm text-gray-500 tracking-wide uppercase">Laporan Bulanan Siswa</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('absensi.show', $kelas) }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-bold text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
        <button onclick="window.print()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold text-sm shadow-lg shadow-indigo-200">
            <i class="fas fa-print mr-1"></i> Cetak PDF
        </button>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase text-center w-12 sticky left-0 bg-gray-50">No</th>
                    <th class="p-4 text-xs font-bold text-gray-400 uppercase sticky left-12 bg-gray-50 min-w-[150px]">Nama Siswa</th>
                    {{-- Loop Tanggal 1-31 --}}
                    @for($i = 1; $i <= 31; $i++)
                        <th class="p-2 text-[10px] font-bold text-gray-400 border-l border-gray-50 text-center w-8">{{ $i }}</th>
                    @endfor
                    <th class="p-4 text-xs font-bold text-green-500 text-center bg-green-50">H</th>
                    <th class="p-4 text-xs font-bold text-red-500 text-center bg-red-50">A</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($data_siswa as $key => $s)
                <tr class="hover:bg-gray-50/50">
                    <td class="p-4 text-center text-sm text-gray-500 sticky left-0 bg-white">{{ $key + 1 }}</td>
                    <td class="p-4 text-sm font-bold text-gray-800 uppercase sticky left-12 bg-white">{{ $s->nama }}</td>
                    
                    @for($i = 1; $i <= 31; $i++)
                        <td class="p-2 border-l border-gray-50 text-center text-[10px] text-gray-400">
                            {{-- Placeholder tanda centang --}}
                            <i class="fas fa-check text-green-400/30"></i>
                        </td>
                    @endfor

                    <td class="p-4 text-center font-bold text-green-600 bg-green-50/30">31</td>
                    <td class="p-4 text-center font-bold text-red-600 bg-red-50/30">0</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 text-[10px] text-gray-400 font-bold uppercase tracking-widest flex gap-4">
    <span class="flex items-center gap-1"><div class="w-2 h-2 bg-green-500 rounded-full"></div> H = Hadir</span>
    <span class="flex items-center gap-1"><div class="w-2 h-2 bg-red-500 rounded-full"></div> A = Alpa</span>
</div>
@endsection