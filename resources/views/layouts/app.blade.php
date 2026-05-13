<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi SMK Negeri 1 Garut</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar sesuai image_665e92.png -->
        <aside class="w-64 bg-gray-300 min-h-screen p-6 space-y-8 fixed shadow-lg">
            
            <div class="mb-10 text-center">
                <h2 class="font-black text-gray-800 tracking-tighter text-xl">ABSENSI APP</h2>
            </div>

            <nav class="space-y-6">
                <!-- Tombol DASHBOARD -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 group">
                    <div class="w-10 h-10 {{ request()->routeIs('dashboard') ? 'bg-indigo-600' : 'bg-gray-500' }} rounded shadow-sm group-hover:bg-indigo-600 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-home text-white"></i>
                    </div>
                    <span class="font-bold {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-700' }} tracking-widest group-hover:text-indigo-600 transition">DASHBOARD</span>
                </a>

                <!-- Tombol ABSENSI -->
                <a href="{{ route('absensi.index') }}" class="flex items-center gap-4 group">
                    <div class="w-10 h-10 {{ request()->routeIs('absensi.*') ? 'bg-indigo-600' : 'bg-gray-500' }} rounded shadow-sm group-hover:bg-indigo-600 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-user-check text-white"></i>
                    </div>
                    <span class="font-bold {{ request()->routeIs('absensi.*') ? 'text-indigo-600' : 'text-gray-700' }} tracking-widest group-hover:text-indigo-600 transition">ABSENSI</span>
                </a>

                <!-- Tombol Tambah Siswa (Opsional jika ingin tetap ada di sidebar) -->
                <a href="{{ route('siswa.create') }}" class="flex items-center gap-4 group">
                    <div class="w-10 h-10 {{ request()->routeIs('siswa.create') ? 'bg-indigo-600' : 'bg-gray-500' }} rounded shadow-sm group-hover:bg-indigo-600 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                    <span class="font-bold {{ request()->routeIs('siswa.create') ? 'text-indigo-600' : 'text-gray-700' }} tracking-widest group-hover:text-indigo-600 transition">TAMBAH SISWA</span>
                </a>
            </nav>

            <!-- Bagian Logout di bawah -->
            <div class="absolute bottom-10 left-6 right-6">
                <a href="/" class="flex items-center gap-4 group text-red-500">
                    <div class="w-10 h-10 bg-red-100 rounded flex items-center justify-center group-hover:bg-red-500 group-hover:text-white transition">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <span class="font-bold tracking-widest uppercase text-sm">Keluar</span>
                </a>
            </div>
        </aside>

        <!-- Container Utama untuk Konten Kanan -->
        <main class="flex-1 ml-64 p-10 min-h-screen">
            <!-- Tempat konten dari file dashboard, absensi, dll muncul -->
            @yield('content')
        </main>
    </div>

</body>
</html>