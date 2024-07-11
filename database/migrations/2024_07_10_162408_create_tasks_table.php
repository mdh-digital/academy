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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->uuid('silabus_id')->index();
            $table->string('name');
            $table->longText('description');
            $table->timestamp('due_date')->nullable();
            $table->uuid('requirement_learning_id')->index()->nullable();
            $table->enum('type',['video','text','file'])->default('text');
            $table->string('thumbnail')->nullable();
            $table->string('file')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
