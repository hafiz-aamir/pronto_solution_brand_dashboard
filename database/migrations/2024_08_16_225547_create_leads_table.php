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
        Schema::create('leads', function (Blueprint $table) {
            
            $table->id(); // Auto-incrementing ID
            $table->uuid('uuid')->unique(); // UUID column
            $table->string('name')->nullable(); // Name column
            $table->string('email')->nullable(); // Email column
            $table->text('phone')->nullable(); // Phone column
            $table->longText('message')->nullable(); // Message column
            $table->text('ip')->nullable(); // IP column
            $table->string('brand_name')->nullable(); // Brand name column
            $table->text('page_url')->nullable(); // Page URL column
            $table->integer('status')->default(0); // Status column, default 0
            $table->timestamp('created_at')->nullable(); // Created at column

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
