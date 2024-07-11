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
        Schema::create('user_links', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->uuid('user_id')->index();
            $table->string('name')->nullable();
            $table->enum('type',['sosmed','link'])->default('link');
            $table->enum('sosmed',['facebook','x','youtube','website','github','instagram','linkedin'])->nullable();
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_links');
    }
};
