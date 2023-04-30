<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('university_id')->unsinged();
            // $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');

            $table->bigInteger('salesman_id')->nullable();
            $table->bigInteger('agency_id')->unsigned();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            $table->string('status')->nullable();
            $table->string('text_note')->nullable();
            $table->string('kind_of_course')->nullable();
            $table->string('start_date')->nullable();
            $table->string('fees')->nullable();
            $table->integer('markter_id')->nullable();
            $table->string('manual_id')->nullable();



            $table->string('creator');
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
        Schema::dropIfExists('university_requests');
    }
}
