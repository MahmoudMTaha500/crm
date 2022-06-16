<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university__agencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('university_id')->unsinged();
            // $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->bigInteger('agency_id')->unsigned();
            // $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
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
        Schema::dropIfExists('university__agencies');
    }
}
