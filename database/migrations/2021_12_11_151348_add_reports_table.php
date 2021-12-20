<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('reporterID')->nullable();

            $table->unsignedBigInteger('reportTypeID')->nullable();

            $table->timestamp('addedOn')->nullable();
            $table->string('reportContent');
            $table->unsignedBigInteger('focusesOnUser')->nullable();

            $table->integer('isOpenned')->nullable()->default(1);

            $table->foreign('reporterID')->references('id')->on('users');
            $table->foreign('reportTypeID')->references('id')->on('report_types');
            $table->foreign('focusesOnUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
