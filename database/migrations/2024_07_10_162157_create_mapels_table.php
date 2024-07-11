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
        Schema::create('mapels', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->uuid('pic_id')->index();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('background')->nullable();
            $table->longText('description')->nullable();
            $table->longText('days_schedule')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
