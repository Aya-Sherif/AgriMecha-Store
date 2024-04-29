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
        Schema::create('p_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name')->unique();
            $table->decimal('price', 8, 2); // Using decimal for price to handle decimal values
            $table->string('productname');
            $table->string('image'); // Assuming storing image paths
            $table->text('description');
            $table->decimal('discount')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('pdf_file')->nullable(); // Add a column for the PDF file
            $table->json('additional_data')->nullable(); // Add a column for additional data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_models');
    }
};
