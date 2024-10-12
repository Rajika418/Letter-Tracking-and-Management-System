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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('recipient_id'); // Foreign key for the recipient (from assignees table)
            $table->string('message'); // Column for the notification text
            $table->boolean('is_read')->default(false); // Boolean to track if the notification is read, default is false
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Define foreign key constraint
            $table->foreign('recipient_id')->references('id')->on('assignees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
