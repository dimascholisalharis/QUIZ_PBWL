<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artist;


class ArtistController extends Controller
{
   
    public function index()
    {
        $rows = artist::All();
        return view('artist.index', compact('rows'));
    }

    public function create()
    {
        return view('artist.add');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'bail|required:tb_artist'
        ],
        [
            'artist_name.required' => 'Isi Nama !'
       ]);

       artist::create([
            'artist_name' => $request->artist_name
       ]);

       return redirect('artist'); 
    }


    public function edit($id)
    {
        
        $rows = artist::findOrFail($id);
        return view('artist.edit', compact('rows'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'artist_name' => 'bail|required:tb_artist'
        ],
        [
        
        'artist_name.required' => 'Isi Nama !'
        ]);

        $rows = artist::findOrFail($id);
        $rows->update([
            'artist_name' => $request->artist_name
        ]);

        return redirect('artist');
    }

    public function destroy($id)
    {
        $rows = artist::findOrFail($id);
        $rows->delete();
    }
}