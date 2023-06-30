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
        Schema::create('fees', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id');
            $table->foreignId('student_id');
            $table->foreignId('class_id');
            $table->string('balance');
            $table->string('mode_of_payment');
            $table->string('payment_code');
            $table->string('date_of_payment');
            $table->string('amount_paid');
            $table->string('term');
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
        Schema::dropIfExists('fees');
    }
};
