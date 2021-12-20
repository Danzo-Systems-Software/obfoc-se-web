<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('vehicleName');
            $table->float('latitude');
            $table->float('longitude');
            $table->timestamp('postDate');
            $table->unsignedBigInteger('updatedById')->nullable();
            $table->foreign('updatedById')->references('id')->on('users');
            $table->string('postNotes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
