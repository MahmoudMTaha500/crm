<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_universities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('request_id')->unsigned();
            $table->foreign('request_id')->references('id')->on('university_requests')->onDelete('cascade');
            $table->integer('total');
            $table->integer('pay')->nullable();
            $table->integer('remain')->nullable();

            $table->integer('commission_percentage')->nullable();
            $table->integer('commission_total')->nullable();
            $table->integer('commission_received')->nullable();
            $table->integer('commission_remain')->nullable();
            $table->string('student_period')->nullable();

            $table->string('status_paied')->nullable();
            $table->string('status_followed')->nullable();
            $table->string('university_note')->nullable();
            $table->string('sat_note')->nullable();
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
        Schema::dropIfExists('finance_universities');
    }
}
