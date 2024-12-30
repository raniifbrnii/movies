<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre; // Tanpa Models

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'id' => 'genre-1',
            'name' => 'Action'
        ]);

        Genre::create([
            'id' => 'genre-2',
            'name' => 'Comedy'
        ]);

        // Tambahkan genre lainnya jika diperlukan
    }
}
