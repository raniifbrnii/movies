<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Styling tambahan untuk Tailwind tidak mengganggu default */
        img {
            max-width: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-700">Tambah Film Baru</h1>

        <!-- Tampilkan error jika ada -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Oops! Terjadi beberapa kesalahan.</strong>
                <ul class="list-disc mt-2 ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form tambah film -->
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul -->
            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Judul Film</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" value="{{ old('title') }}" required>
            </div>

            <!-- Sinopsis -->
            <div class="mb-4">
                <label for="synopsis" class="block font-medium text-gray-700">Sinopsis</label>
                <textarea name="synopsis" id="synopsis" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" required>{{ old('synopsis') }}</textarea>
            </div>

            <!-- Upload Poster -->
            <div class="mb-4">
                <label for="poster" class="block font-medium text-gray-700">Poster Film</label>
                <input type="file" name="poster" id="poster" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" accept="image/*" required>
                <div id="posterPreview" class="mt-2"></div>
            </div>

            <!-- Tahun -->
            <div class="mb-4">
                <label for="year" class="block font-medium text-gray-700">Tahun Rilis</label>
                <input type="number" name="year" id="year" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" value="{{ old('year') }}" min="1900" max="2100" required>
            </div>

            <!-- Tersedia -->
            <div class="mb-4">
                <label for="available" class="block font-medium text-gray-700">Tersedia</label>
                <select name="available" id="available" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" required>
                    <option value="1" {{ old('available') == '1' ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('available') == '0' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Genre -->
            <div class="mb-4">
                <label for="genre_id" class="block font-medium text-gray-700">Genre</label>
                <select name="genre_id" id="genre_id" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" required>
                    <option value="" disabled selected>Pilih Genre</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                Simpan
            </button>
        </form>

        <!-- JavaScript untuk pratinjau gambar -->
        <script>
            document.getElementById('poster').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const previewDiv = document.getElementById('posterPreview');
                previewDiv.innerHTML = ''; // Hapus pratinjau sebelumnya
                if (file) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    previewDiv.appendChild(img);
                }
            });
        </script>
    </div>
</body>
</html>
