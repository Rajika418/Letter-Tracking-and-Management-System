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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('user_name'); // User name column
            $table->string('password'); // Password column
            $table->unsignedBigInteger('role_id'); // Foreign key for roles table
            $table->string('email')->unique(); // Email column
            $table->string('image')->nullable();
            $table->string('password_reset_token')->nullable(); // Token for password reset
            $table->timestamp('password_reset_expires_at')->nullable(); // Expiration time for password reset token
            $table->softDeletes(); 
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Define the foreign key constraint for role_id
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
