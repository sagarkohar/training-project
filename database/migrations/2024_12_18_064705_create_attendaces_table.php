<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendaces', function (Blueprint $table) {
            $table->id();

            $table->string("employee");
            $table->string("department");
            $table->string("designation");
            $table->date("date");
            $table->time("in_time");
            $table->time("out_time");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendaces');
    }
};
