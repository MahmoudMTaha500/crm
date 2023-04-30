<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->integer('finance_id')->nullable();
            $table->integer('finance_english_school_id')->nullable();
            // $table->foreign('finance_id')->references('id')->on('finance_universities')->onDelete('cascade');
            $table->string('commission')->nullable();
            $table->string('commission_date')->nullable();
            $table->string('study_period')->nullable();
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
        Schema::dropIfExists('commissions');
    }
}
