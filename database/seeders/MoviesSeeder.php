<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie; // Tanpa Models

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'id' => 'movie-1',
            'title' => 'Inception',
            'synopsis' => 'A mind-bending thriller',
            'poster' => 'inception-poster.jpg',
            'year' => 2010,
            'available' => true,
            'genre_id' => 'genre-1' // Pastikan ID genre sesuai
        ]);

        Movie::create([
            'id' => 'movie-2',
            'title' => 'Superbad',
            'synopsis' => 'A hilarious comedy',
            'poster' => 'superbad-poster.jpg',
            'year' => 2007,
            'available' => true,
            'genre_id' => 'genre-2' // Pastikan ID genre sesuai
        ]);

        // Tambahkan movie lainnya jika diperlukan
    }
}
