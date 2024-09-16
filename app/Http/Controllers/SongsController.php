<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::with('genre', 'artist', 'album')->get()->sortByDesc('id');
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songs.create', [
            'artists' => Artist::all(),
            'genres' => Genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'genre_id' => ['required'],
            'artist_id' => ['required'],
            'album_id' => ['required']
        ]);

        Song::query()->create($request->all());
        return redirect()->route('song.index')->with('success', 'Song created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $songs = Song::query()->findOrFail($id);
        return view('songs.edit', [
            'songs' => $songs,
            'genres' => Genre::all(),
            'artists' => Artist::all(),
            'albums' => Album::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required'],
            'genre_id' => ['required'],
            'artist_id' => ['required'],
            'album_id' => ['required']
        ]);

        $song = Song::query()->findOrFail($id);
        $song->update($request->all());
        return redirect()->route('song.index')->with('success', 'Song updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Song::query()->findOrFail($id)->delete();
        return redirect()->route('song.index')->with('success', 'Song Deleted successfully');
    }


    public function getAlbums($id)
    {
        $album = Album::where('artist_id', $id)->get();
        return response()->json($album);
    }
}
