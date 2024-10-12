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
        Schema::create('assignees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for users table
            $table->string('full_name'); // Full name of the assignee
            $table->string('address'); // Address of the assignee
            $table->unsignedBigInteger('job_id'); // Foreign key for job_positions table
            $table->unsignedBigInteger('position_id'); // Foreign key for department_positions table
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('job_positions')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('department_positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignees');
    }
};
