<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id') // Foreign key for categories table
                ->constrained() // Automatically references the 'id' column on the 'categories' table
                ->onDelete('cascade'); // Optional: delete products when category is deleted
            // Optional: delete products when merchant category is deleted
            $table->string('name');
            $table->text('description'); // Product description
            $table->decimal('tappoint_percentage', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
