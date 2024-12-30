<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'id' => '1',
                'name' => 'Action',
            ],
            [
                'id' => '2',
                'name' => 'Comedy',
            ],
            [
                'id' => '3',
                'name' => 'Drama',
            ],
            // Tambahkan genre lain sesuai kebutuhan
        ]);
    }
}
