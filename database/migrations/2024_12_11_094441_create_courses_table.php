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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("status");
            $table->text("description");
            $table->string("department");
            $table->string("Designation");
            $table->string("Brand");
            $table->string("store");
            $table->string("skill");
            $table->string("rating");

            $table->string("user");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};