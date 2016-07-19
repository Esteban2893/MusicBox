<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_track', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->integer('track_id')->unsigned();
            $table->timestamps();

            $table->foreign('album_id')
            ->references('id')->on('albums');
            $table->foreign('track_id')
            ->references('id')->on('tracks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('album_track');
    }
}
