<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperheroesImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superheroes_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('superhero_id');
            $table->foreign('superhero_id')
                ->references('id')->on('superheroes')
                ->onDelete('cascade');
            $table->string('image','255');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superheroes_images');
    }
}
