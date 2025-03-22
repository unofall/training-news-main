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
        Schema::create('blogs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('foto')->nullable(); 
            $table->string('title')->nullable(); 
            // $table->enum('categories', ['travel', 'topic', 'fashion'])->nullable();
            $table->text('description')->nullable(); 
            $table->integer('likes_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
