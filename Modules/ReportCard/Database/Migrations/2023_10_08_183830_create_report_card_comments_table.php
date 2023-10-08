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
        Schema::create('report_card_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('position');
            $table->string('term');
            $table->foreignId('teachers_comment');
            $table->string('next_term_begins');
            $table->foreignId('teachers_id');
            $table->foreignId('headteachers_comment')->nulable();
            $table->foreignId('headteachers_id');
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
        Schema::dropIfExists('report_card_comments');
    }
};
