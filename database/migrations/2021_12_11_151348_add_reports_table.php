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
            $table->id();
            $table->integer('reporterId')->references('id')->on('users');
            $table->integer('reportType')->references('id')->on('reportTypes');
            $table->timestamp('addedOn');
            $table->string('reportContent');
            $table->integer('focusesOnUser')->references('id')->on('users');
            $table->integer('isOpenned')->nullable()->default(1);
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
