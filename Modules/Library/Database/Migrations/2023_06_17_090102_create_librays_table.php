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
        Schema::create('librays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id');
            $table->foreignId('class_id');
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('date_of_entry');
            $table->string('number_of_books');
            $table->enum('status',['available','borrowed','out_of_stock']);
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
        Schema::dropIfExists('librays');
    }
};
