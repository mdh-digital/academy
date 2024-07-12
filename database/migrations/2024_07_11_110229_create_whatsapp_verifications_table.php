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
        Schema::create('whatsapp_verifications', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->uuid('user_id')->index()->nullable();
            $table->string('phone')->nullable();
            $table->enum('type',['auth','without_auth'])->default('without_auth');
            $table->string('verify_code');
            $table->timestamp('temporary_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsapp_verifications');
    }
};
