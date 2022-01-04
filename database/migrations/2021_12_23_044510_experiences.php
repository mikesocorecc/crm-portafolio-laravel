<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Experiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->string('company');
            $table->string('description');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('image');
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
        //
    }
}
