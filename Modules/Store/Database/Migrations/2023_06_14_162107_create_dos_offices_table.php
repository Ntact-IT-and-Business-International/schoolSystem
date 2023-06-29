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
        Schema::create('dos_offices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id');
            $table->foreignId('items_id');
            $table->foreignId('user_id');
            $table->string('term');
            $table->string('date');
            $table->string('units');
            $table->string('quantity');
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
        Schema::dropIfExists('dos_offices');
    }
};
