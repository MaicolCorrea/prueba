<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('category')->unique();
            $table->text('description')->nullable();
            $table->boolean('category_state')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        
    }
};
