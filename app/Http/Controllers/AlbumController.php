<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\album;
use App\artist;

class AlbumController extends Controller
{
  
    public function index()
    {
         $rows = album::paginate(10);
        return view('album.index', compact('rows'));
    }

    public function create()
    {
        $artist = artist::All();
        return view('album.add', compact('artist'));   
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'album_name'     => 'required',
            'artist_id'      => 'required'
         ]);

        $rows=album::create([
            'album_name'     => $request->album_name,
            'artist_id'      => $request->artist_id
        ]);
        
        return redirect('album'); 

    }

    public function edit($id)
    {
         $artist = artist::All();
         $rows = album::findOrFail($id);
        return view('album.edit', compact('rows','artist'));
    }

    public function update(Request $request, $id)
    {
         $rows = album::find($id);
         $rows->update([
            'album_name' => $request->album_name,
            'artist_id'  => $request->artist_id   
         ]);

        return redirect('album');
    }

    public function destroy($id)
    {
        
        $rows = album::findOrFail($id);
        $rows->delete();

        return redirect('album');
    
    }
}