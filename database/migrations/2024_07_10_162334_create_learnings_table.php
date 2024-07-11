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
        Schema::create('learnings', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->uuid('silabus_id')->index();
            $table->uuid('user_id')->index();
            $table->string('name');
            $table->string('date');
            $table->string('time');
            $table->string('thumbnail')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('meet_link')->nullable();
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learnings');
    }
};
