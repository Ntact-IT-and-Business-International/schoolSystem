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
        Schema::create('user_type_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usertype_id');
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('created_by');
            $table->enum('status',['active','suspended','deleted'])->default('active');
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
        Schema::dropIfExists('user_type_permissions');
    }
};
