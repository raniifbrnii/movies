<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Movie;
use App\Models\Genre;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    public function test_movies_page_displays_movies()
    {
        // Arrange: Membuat data dummy
        $genre = Genre::factory()->create(['name' => 'Action']);
        Movie::factory()->create([
            'title' => 'Sample Movie',
            'genre_id' => $genre->id,
            'year' => 2023,
            'synopsis' => 'Sample synopsis'
        ]);

        // Act: Akses halaman /movies
        $response = $this->get('/movies');

        // Assert: Memastikan data ditampilkan
        $response->assertStatus(200);
        $response->assertSee('Sample Movie');
        $response->assertSee('Action');
    }
}
