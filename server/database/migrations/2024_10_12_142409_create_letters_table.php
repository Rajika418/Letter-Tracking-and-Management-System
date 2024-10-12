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
        Schema::create('letters', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('no')->nullable(); // Letter number, nullable
            $table->date('date'); // Date of the letter
            $table->unsignedBigInteger('way_id'); // Foreign key for received_ways table
            $table->string('sender'); // Sender of the letter
            $table->string('title'); // Title of the letter
            $table->unsignedBigInteger('assignee_id'); // Foreign key for assignees table
            $table->string('letter_pdf'); // Path to the PDF of the letter
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Define foreign key constraints
            $table->foreign('way_id')->references('id')->on('received_ways')->onDelete('cascade');
            $table->foreign('assignee_id')->references('id')->on('assignees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
