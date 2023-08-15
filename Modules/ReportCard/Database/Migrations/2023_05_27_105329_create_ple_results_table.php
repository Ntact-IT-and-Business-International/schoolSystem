<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ple_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('div1');
            $table->integer('div2');
            $table->integer('div3');
            $table->integer('div4');
            $table->integer('U');
            $table->integer('X');
            $table->integer('total');
            $table->string('year');
            $table->string('result');
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
        Schema::dropIfExists('ple_results');
    }
};
