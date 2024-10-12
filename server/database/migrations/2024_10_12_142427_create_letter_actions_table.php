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
        Schema::create('letter_actions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('letter_id'); // Foreign key for letters table
            $table->unsignedBigInteger('assignee_id'); // Foreign key for assignees table
            $table->unsignedBigInteger('action_id'); // Foreign key for actions table
            $table->string('other_action')->nullable(); // Other action description (nullable)
            $table->date('date'); // Date of the action
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Define foreign key constraints
            $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
            $table->foreign('assignee_id')->references('id')->on('assignees')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_actions');
    }
};
