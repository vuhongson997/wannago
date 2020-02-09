<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTStays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_stays', function (Blueprint $table) {
            $table->bigIncrements('stay_id');
            $table->integer('address_id');
            $table->integer('city_id');
            $table->string('stay_name');
            $table->integer('stay_type_id');
            $table->integer('price');
            $table->string('discount');
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
        Schema::dropIfExists('t_stays');
    }

}
