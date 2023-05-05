<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_charge')->nullable();
            $table->string('shopname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('adderss')->nullable();
            $table->string('banco')->nullable();
            $table->string('cuenta')->nullable();
            $table->string('tipocuenta')->nullable();
            $table->string('beneficiario')->nullable();
            $table->string('cedula')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            
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
        Schema::dropIfExists('settings');
    }
}
