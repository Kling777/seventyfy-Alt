<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all()->sortByDesc('id');
        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:countries,name,except,id'],
        ]);
        Country::create($request->all());
        return redirect()->route('country.index')->with('success', 'Country created successfully');
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
        $countries = Country::query()->findOrFail($id);
        return view('countries.edit', compact('countries'));
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
            'name.unique' => 'Country already exists'
        ]);

        Country::query()->findOrFail($id)->update($request->all());
        return redirect()->route('country.index')->with('success', 'Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Country::query()->findOrFail($id)->delete();
            return redirect()->route('country.index')->with('success', 'Country deleted successfully');
        } catch (QueryException) {
            return redirect()->route('country.index')->with('error', 'Cannot delete Country: it is referenced by other records.');
        }
    }
}
