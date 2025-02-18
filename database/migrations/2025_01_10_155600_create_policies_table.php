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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->text('content');
            $table->text('FAQ');
            $table->text('about');
            $table->timestamps();
        });
        Schema::table('product_variants', function (Blueprint $table) {
            $table->foreignId('policy_id')->nullable()->constrained('policies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
