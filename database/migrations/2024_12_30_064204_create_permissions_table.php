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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();

            $table->string("role");
            $table->string("view")->nullable();
            $table->string("edit")->nullable();
            $table->string("add")->nullable();
            $table->string("delete")->nullable();
            $table->unsignedBigInteger('models_id')->nullable(); // Add the column
            $table->foreign('models_id')->references('id')->on('models'); // Foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
