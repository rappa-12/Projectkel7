<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-indigo-600 flex items-center justify-center min-h-screen">

    <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md">
        <!-- Logo/Icon -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-lock text-3xl"></i>
            </div>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Login Admin</h1>
            <p class="text-gray-500 text-sm">Silahkan masuk ke akun Anda</p>
        </div>

        <!-- Form Action diarahkan ke login.proses -->
        <form action="{{ route('login.proses') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Username / Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="text" name="email" 
                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-indigo-500 focus:outline-none transition" 
                        placeholder="admin@smk.id" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fas fa-key"></i>
                    </span>
                    <input type="password" name="password" 
                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-indigo-500 focus:outline-none transition" 
                        placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-indigo-200 transition-all duration-300 transform hover:-translate-y-1">
                MASUK SEKARANG
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">SMK Negeri 1 Garut</p>
        </div>
    </div>

</body>
</html>