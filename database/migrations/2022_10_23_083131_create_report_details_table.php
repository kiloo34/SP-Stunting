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
        Schema::create('report_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('criteria_id');
            $table->unsignedBigInteger('catin_id');

            $table->integer('value');

            $table->foreign('report_id')->references('id')->on('reports');
            $table->foreign('criteria_id')->references('id')->on('criterias');
            $table->foreign('catin_id')->references('id')->on('catin');

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
        Schema::dropIfExists('report_details');
    }
};
