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
            $table->int('div1');
            $table->int('div2');
            $table->int('div3');
            $table->int('div4');
            $table->int('U');
            $table->int('X');
            $table->int('total');
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
