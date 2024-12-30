<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Mengambil semua film beserta genre-nya, terurut dari yang paling lama ke yang terbaru
    $movies = Movie::with('genre')->orderBy('created_at', 'asc')->get();
    return view('movies.index', compact('movies'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua genre untuk dropdown
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'synopsis' => 'required',
            'poster' => 'required|image|max:2048',
            'year' => 'required|integer|min:1900|max:2100',
            'available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);
    
        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }
    
        Movie::create([
            'title' => $request->title,
            'synopsis' => $request->synopsis,
            'poster' => $posterPath,
            'year' => $request->year,
            'available' => $request->available,
            'genre_id' => $request->genre_id,
        ]);
    
        return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan.');
    }
    
}
