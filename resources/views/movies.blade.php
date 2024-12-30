<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
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
        <h1 class="text-3xl font-bold text-blue-600">Daftar Film</h1>
        
        <!-- Tabel Daftar Film -->
        @if($movies->isEmpty())
            <div class="text-center text-gray-500 text-lg">Belum ada data film yang tersedia.</div>
        @else
            <table class="min-w-full table-auto border-collapse border border-gray-200 mt-6">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-2 px-4 border border-gray-200">Judul</th>
                        <th class="py-2 px-4 border border-gray-200">Sinopsis</th>
                        <th class="py-2 px-4 border border-gray-200">Poster</th>
                        <th class="py-2 px-4 border border-gray-200">Tahun</th>
                        <th class="py-2 px-4 border border-gray-200">Tersedia</th>
                        <th class="py-2 px-4 border border-gray-200">Genre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border border-gray-200">{{ $movie->title }}</td>
                            <td class="py-2 px-4 border border-gray-200">{{ Str::limit($movie->synopsis, 100) }}</td>
                            <td class="py-2 px-4 border border-gray-200">
                                @if($movie->poster)
                                    <img class="w-24 rounded-md" src="{{ asset('storage/' . $movie->poster) }}" alt="Poster">
                                @else
                                    <span class="text-gray-500">No Poster</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border border-gray-200">{{ $movie->year }}</td>
                            <td class="py-2 px-4 border border-gray-200">{{ $movie->available ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-2 px-4 border border-gray-200">{{ $movie->genre->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
