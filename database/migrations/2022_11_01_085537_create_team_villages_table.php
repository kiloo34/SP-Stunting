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
        Schema::create('team_villages', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('village_id');

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('village_id')->references('id')->on('villages');

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
        Schema::dropIfExists('team_villages');
    }
};
