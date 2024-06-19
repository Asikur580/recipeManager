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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete(); // References the user who created the recipe
            $table->string('title');
            $table->text('description');
            $table->text('ingredients'); // Could be JSON or text
            $table->text('instructions'); // Detailed instructions for the recipe
            $table->string('tags')->nullable(); // Comma-separated list of tags
            $table->string('image')->nullable(); // URL or path to the image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
