<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->bigInteger('type_id')->unsigned();
            // $table->foreign('type_id')->references('id')->on('visa_types')->onDelete('cascade');
            $table->bigInteger('salesman_id')->nullable();
            // $table->foreign('salesman_id')->references('id')->on('sales_men')->onDelete('cascade');
            $table->bigInteger('bank_id')->unsigned();
            // $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->bigInteger('transfer_bank_id')->unsigned();
            // $table->foreign('transfer_bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('date');
            $table->smallInteger('paid')->default(0)->nullable();

            $table->integer('fees');
            $table->string('payment');
            $table->string('other')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('visas');
    }
}
