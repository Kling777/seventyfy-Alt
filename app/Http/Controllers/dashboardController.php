<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {

        $songCount = Song::all()->count();
        $genreCount = Genre::all()->count();
        $artistCount = Artist::all()->count();
        $albumCount = Album::all()->count();
        $countryCount = Country::all()->count();

        return view('dashboard', compact('songCount', 'genreCount', 'artistCount', 'albumCount', 'countryCount'));
    }
}
