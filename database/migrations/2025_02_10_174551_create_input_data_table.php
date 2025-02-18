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
        Schema::create('input_data', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('validation')->nullable();
            // $table->string('required');
            $table->string('type')->nullable();
            $table->string('placeholder')->nullable();
            $table->string('value')->nullable();
            $table->string('label')->nullable();
            $table->foreignId('form_name_id')->constrained('form_names')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_data');
    }
};
