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
        Schema::create('midterm_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('class_position');
            $table->string('term');
            $table->string('teacher_comment');
            $table->foreignId('teacher_id');
            $table->string('headteacher_comment')->nullable();
            $table->foreignId('headteacher_id')->nullable();
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
        Schema::dropIfExists('midterm_comments');
    }
};
