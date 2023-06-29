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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('class_id');
            $table->foreignId('subject_id');
            $table->string('term');
            $table->string('assessment_marks')->nullable();
            $table->string('examination_marks')->nullable();
            $table->string('grade')->nullable();
            $table->string('teacher_initials')->nullable();
            $table->string('remark')->nullable();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('results');
    }
};
