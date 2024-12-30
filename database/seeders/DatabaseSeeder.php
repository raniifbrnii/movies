<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(GenresSeeder::class);  // Memanggil seeder genres
        $this->call(MoviesSeeder::class);  // Memanggil seeder movies
    }
}
