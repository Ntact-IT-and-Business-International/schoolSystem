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
        Schema::create('scholastic_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requested_by');
            $table->foreignId('item_id');
            $table->foreignId('office');
            $table->string('number_of_items');
            $table->enum('status',['pending','approved','rejected']);
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
        Schema::dropIfExists('scholastic_requests');
    }
};
