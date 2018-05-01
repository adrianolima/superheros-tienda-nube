<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Superheroes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superheroes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname',50);
            $table->string('real_name', 150);
            $table->longText('origin_description');
            $table->longText('superpowers');
            $table->string('catch_phrase', 255);
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
        Schema::dropIfExists('superheroes');
    }
}
