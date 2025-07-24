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
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('platform');
            $table->string('instructor');
            $table->string('date'); // Store as string for flexibility (could be "2023", "Q1 2023", etc.)
            $table->string('image_url')->nullable();
            $table->text('description');
            $table->string('course_url')->nullable();
            $table->string('duration');
            $table->enum('status', ['completed', 'in_progress', 'planned'])->default('completed');
            $table->json('skills'); // Array of skills covered
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
