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
        Schema::create('department_positions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('department_id'); // Foreign key for departments table
            $table->string('name'); // Position name
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Define the foreign key constraint for department_id
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_positions');
    }
};
