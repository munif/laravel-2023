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
        Schema::create('link_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title', 60);
            $table->string('slug', 60)->unique();
            $table->text('description')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_lists');
    }
};
