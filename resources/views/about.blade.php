<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold"></h1>
            <nav>
            <nav>
            <a href="{{ route('home') }}" class="text-white hover:underline px-4 border-b border-transparent hover:border-white {{ request()->is('home') ? 'border-blue-600' : '' }}">Home</a>

    <a href="{{ route('about') }}" class="text-white hover:underline px-4 border-b border-transparent hover:border-white {{ request()->is('about') ? 'border-blue-600' : '' }}">About</a>
    <a href="{{ route('contact') }}" class="text-white hover:underline px-4 border-b border-transparent hover:border-white {{ request()->is('contact') ? 'border-blue-600' : '' }}">Contact</a>
    <a href="{{ route('movies.index') }}" class="text-white hover:underline px-4 border-b border-transparent hover:border-white {{ request()->is('movies*') ? 'border-blue-600' : '' }}">Film</a>
    <a href="{{ route('movies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">Tambah Film</a>
</nav>

            </nav>
        </div>
    </header>

    <!-- Konten -->
    <div class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-600">Tentang Aplikasi Ini</h1>
        <p class="mt-4 text-gray-700">Aplikasi ini dirancang untuk membantu Anda mengelola daftar film dengan mudah.</p>
    </div>

</body>
</html>
