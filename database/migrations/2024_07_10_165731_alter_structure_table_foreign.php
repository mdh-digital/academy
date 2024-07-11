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
        Schema::table('mapels', function (Blueprint $table) {
            $table->foreign('pic_id')->references('id')->on('users')->onDelete('no action'); 
        });

        Schema::table('silabuses', function (Blueprint $table) {
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('cascade'); 
        });

        Schema::table('learnings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action'); 
            $table->foreign('silabus_id')->references('id')->on('users')->onDelete('cascade'); 
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('learning_id')->references('id')->on('learnings')->onDelete('cascade'); 
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('silabus_id')->references('id')->on('silabuses')->onDelete('no action'); 
            $table->foreign('requirement_learning_id')->references('id')->on('learnings')->onDelete('no action'); 
        });

        Schema::table('user_tasks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('no action'); 
            $table->foreign('pic_check_id')->references('id')->on('users')->onDelete('no action'); 
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('user_tasks')->onDelete('cascade'); 
        });

        Schema::table('mapel_user_accesses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('cascade'); 
        });

        Schema::table('user_links', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
