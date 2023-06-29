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
        Schema::create('nurse_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicine_id');
            $table->string('quantity');
            $table->string('amount');
            $table->string('type');
            $table->foreignId('office_incharge_id');
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
        Schema::dropIfExists('nurse_requests');
    }
};
