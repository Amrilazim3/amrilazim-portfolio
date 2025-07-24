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
        Schema::table('projects', function (Blueprint $table) {
            $table->enum('type', ['client', 'personal', 'open_source', 'freelance'])->default('personal')->after('skill_id');
            $table->text('detailed_description')->nullable()->after('name');
            $table->json('technologies')->nullable()->after('detailed_description');
            $table->json('features')->nullable()->after('technologies');
            $table->text('challenge')->nullable()->after('features');
            $table->text('solution')->nullable()->after('challenge');
            $table->string('duration')->nullable()->after('solution');
            $table->text('outcome')->nullable()->after('duration');
            $table->string('github_url')->nullable()->after('project_url');
            $table->boolean('is_featured')->default(false)->after('github_url');
            $table->integer('sort_order')->default(0)->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'type',
                'detailed_description',
                'technologies',
                'features',
                'challenge',
                'solution',
                'duration',
                'outcome',
                'github_url',
                'is_featured',
                'sort_order'
            ]);
        });
    }
};
