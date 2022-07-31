<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('email');
            $table->string('name');
            $table->string('team_name')->nullable();
            $table->string('team_leader')->nullable();
            $table->string('gender');
            $table->string('agency');
            $table->string('phone');
            $table->string('card');
            $table->string('photo');
            $table->string('payment');
            $table->string('twibbon');
            $table->string('follow_ig_cmc')->nullable();
            $table->string('follow_ig_sekoin')->nullable();
            $table->string('register_type');
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
        Schema::dropIfExists('event_registers');
    }
};
