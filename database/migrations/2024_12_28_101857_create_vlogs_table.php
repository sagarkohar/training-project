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
        Schema::create('vlogs', function (Blueprint $table) {
            $table->id();

            $table->string("role");
            $table->string("view")->nullable();
            $table->string("edit")->nullable();
            $table->string("delete")->nullable();
            $table->string("create")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vlogs');
    }
};
