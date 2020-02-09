<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRoomDescriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_room_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('guest_count');
            $table->integer('bed_count');
            $table->integer('bath_count');
            $table->string('description');
            $table->string('is_wifi');
            $table->string('is_smoking');
            $table->integer('stay_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_room_descriptions');
    }
}
