<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracks extends Model
{
    protected $table = 'track';
    protected $primarykey = 'id';
    protected $fillable = ['track_name', 'track_time', 'album_id'];

     public function album()
    {
    	return $this->belongsTo('App\album', 'album_id','id');  
    }


     public function Artist()
    {
        return $this->belongsTo('App\artist', 'artist_id', 'id');  
    }

    public function Played()
    {
     return $this->hasMany('App\played','id');  
    }
   
}