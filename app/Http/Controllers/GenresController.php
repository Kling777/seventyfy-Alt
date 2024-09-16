<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\TryCatch;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all()->sortByDesc('id');
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:12', 'unique:genres,name,except,id'],
        ]);

        Genre::query()->create($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre created successfully');
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
        $genres = Genre::query()->findOrFail($id);
        return view('genres.edit', compact('genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('countries', 'name')->ignore($id),
            ]
        ], [

            'name.required' => 'Name is required'
        ]);

        $genre = Genre::query()->findOrFail($id);
        $genre->update($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Genre::query()->findOrFail($id)->delete();
            return redirect()->route('genre.index')->with('success', 'Genre deleted successfully');
        } catch (QueryException) {
            return redirect()->route('genre.index')->with('error', 'Cannot delete Genre: it is referenced by other records.');
        }
    }
}
