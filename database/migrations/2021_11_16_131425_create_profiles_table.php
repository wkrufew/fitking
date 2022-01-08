<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('telefono')->nullable();
            $table->string('edad')->nullable();
            $table->string('peso')->nullable();
            $table->string('estatura')->nullable();
            $table->string('cuello')->nullable();
            $table->string('brazo')->nullable();
            $table->string('gluteo')->nullable();
            $table->string('pierna')->nullable();
            $table->string('pecho')->nullable();
            $table->string('espalda')->nullable();
            $table->string('fantes')->nullable();
            $table->string('fdespues')->nullable();
            $table->string('total')->nullable();
            $table->string('Observacion')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
