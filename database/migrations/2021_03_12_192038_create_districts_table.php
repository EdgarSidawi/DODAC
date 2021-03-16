<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('region_id')->unsigned();

            $table->integer('malaria_threshold');
            $table->integer('malaria_current');
            $table->integer('cholera_threshold');
            $table->integer('cholera_current');
            $table->integer('corona_threshold');
            $table->integer('corona_current');
            $table->integer('Ebola_threshold');
            $table->integer('Ebola_current');

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

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
        Schema::dropIfExists('districts');
    }
}
