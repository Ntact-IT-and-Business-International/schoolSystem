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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->nullable();
            $table->foreignId('subject_id')->nullable();
            $table->foreignId('user_id');
            $table->string('staff_first_name');
            $table->string('staff_last_name');
            $table->string('staff_other_names')->nullable();
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('staff_email')->nullable();
            $table->string('qualification');
            $table->string('registration_number')->nullable();
            $table->string('title');
            $table->string('documents')->nullable();
            $table->string('salary');
            $table->string('photo');
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
        Schema::dropIfExists('staffs');
    }
};
