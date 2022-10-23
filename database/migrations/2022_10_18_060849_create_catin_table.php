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
        Schema::create('catin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik');
            $table->string('no_hp');
            $table->string('age');
            $table->text('address')->nullable();

            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('team_id');

            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreign('status_id')->references('id')->on('catin_statuses');
            $table->foreign('team_id')->references('id')->on('teams');

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
        Schema::dropIfExists('catin');
    }
};
