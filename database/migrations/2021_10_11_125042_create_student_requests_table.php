<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('study_place_id')->unsigned();
            $table->foreign('study_place_id')->references('id')->on('place_of_studies')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->bigInteger('salesman_id')->unsigned();
            $table->foreign('salesman_id')->references('id')->on('sales_men')->onDelete('cascade');
            $table->bigInteger('agency_id')->unsigned()->default(0);
            // $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->string('course')->default('');
            $table->string('course_note')->default('');


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
        Schema::dropIfExists('student_requests');
    }
}
