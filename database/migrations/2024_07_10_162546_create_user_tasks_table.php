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
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->uuid('id')->index()->unique();
            $table->uuid('task_id')->index();
            $table->uuid('user_id')->index();
            $table->enum('answer_type',['link','video','text','file'])->default('link');
            $table->longText('text')->nullable();
            $table->string('answer')->nullable(); 
            $table->uuid('pic_check_id')->index()->nullable();
            $table->integer('grade')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tasks');
    }
};
