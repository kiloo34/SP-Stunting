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
        Schema::create('catin_criterias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('catin_id');
            $table->unsignedBigInteger('criteria_id');
            $table->float('value');
            $table->integer('conversion')->comment('1 == tidak terpapar, 2 == terpapar');

            $table->foreign('catin_id')->references('id')->on('catin');
            $table->foreign('criteria_id')->references('id')->on('criterias');

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
        Schema::dropIfExists('catin_criterias');
    }
};
