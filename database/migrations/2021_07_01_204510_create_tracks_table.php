<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTracksTable extends Migration
{
   
    public function up()
    {
        Schema::create('track', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('track_name');
             $table->string('track_file')->nullable();
              $table->string('track_time');
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')
                  ->references('id')->on('album');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('track');
    }
}