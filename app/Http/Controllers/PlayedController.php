<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alayed;
use App\track;
use App\artist;
use App\album;

class PlayedController extends Controller
{
    
    public function index()
    {
        $rows = played::paginate(10);
        return view('played.index', compact('rows'));
    }

    
    public function create()
    {
        $tracks = track::All();
        return view('played.add', compact('track')); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'track_id'      => 'required'
         ]);

        $rows=played::create([
            'track_id'      => $request->track_id
        ]);
        
        return redirect('played'); 
    }

    public function edit($id)
    {
        $tracks = track::All();
         $rows = played::findOrFail($id);
        return view('played.edit', compact('rows','track'));
    }

    public function update(Request $request, $id)
    {
        $rows = played::find($id);
         $rows->update([
            'track_id'  => $request->track_id   
         ]);

        return redirect('played');
    }

   
    public function destroy($id)
    {
        $rows = played::findOrFail($id);
        $rows->delete();

        return redirect('played');
    }
}