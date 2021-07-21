<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\track;
use App\artist;
use App\album;

class TracksController extends Controller
{
    
    public function index()
    {
        $rows = track::paginate(10);
        return view('track.index', compact('rows'));
    }

      public function create()
    {
        $album = album::all();
        return view('track.add', compact('album'));
    }

    public function store(Request $request)
    {
        
        $rows = new track();
        $rows->track_name = $request->input('track_name');
        $rows->track_time = $request->input('track_time');
        $rows->album_id     = $request->input('album_id');

        if ($request->hasFile('track_file')) {
            $tracks_file = $request->file('track_file');
            $extension = $tracks_file->getClientOriginalName();
            $filename =  $extension;
            $tracks_file->move('public/uploads/track/', $filename);
            $rows->tracks_file = $filename;
        }
            $rows->save();
            return redirect('track');
          
    }
    
     public function edit($id)
    {
         $album = album::all();
         $rows = track::findOrFail($id);
        return view('track.edit', compact('rows','album'));
    }

    public function update(Request $request, $id)
    {
        $rows = tracks::find($id);
        $rows->track_name = $request->input('track_name');
        $rows->track_time = $request->input('track_time');
        $rows->album_id     = $request->input('album_id');

         if ($request->hasFile('track_file')) {
            $track_file = $request->file('track_file');
            $extension = $track_file->getClientOriginalName();
            $filename =  $extension;
            $track_file->move('public/uploads/track/', $filename);
            $rows->track_file = $filename;
        }

            $rows->save();
            return redirect('track');
    }

    public function destroy($id)
    {
        $rows = track::findOrFail($id);
        $rows->delete();

        return redirect('photo');

    }
}