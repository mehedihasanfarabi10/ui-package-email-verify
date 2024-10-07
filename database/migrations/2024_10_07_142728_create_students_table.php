<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');  // Foreign key to classes table
            $table->string('name', 35)->nullable();
            $table->string('roll')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade'); // Corrected onDelete to 'cascade'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

