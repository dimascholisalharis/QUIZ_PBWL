<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Played extends Model
{
    protected $table = 'played';
    protected $primarykey = 'id';
    protected $fillable = ['track_id'];

     public function Tracks()
    {
     return $this->belongsTo('App\track', 'track_id','id');  
    }
}