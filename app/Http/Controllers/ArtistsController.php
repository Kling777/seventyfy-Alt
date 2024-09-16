<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::with('countries')->get()->sortByDesc('id');
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('artists.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:artists,name,except,id'],
            'bio' => ['nullable', 'max:255'],
            'country_id' => ['required'],
        ]);

        Artist::create($request->all());
        return redirect()->route('artist.index')->with('success', 'Artist Created Successfully');
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
        $artists = Artist::query()->findOrFail($id);
        $countries = Country::all();
        return view('artists.edit', compact('artists', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('artists')->ignore($artist->id)
            ],
            'bio' => ['nullable', 'max:255'],
            'country_id' => ['required'],
        ]);

        $artist->update($request->all());
        return redirect()->route('artist.index')->with('success', 'Artist Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Artist::query()->findOrFail($id)->delete();
        return redirect()->route('artist.index')->with('success', 'Artist Deleted Successfully');
    }
}
