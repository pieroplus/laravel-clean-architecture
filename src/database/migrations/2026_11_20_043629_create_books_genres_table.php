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
        Schema::create('books_genres', function (Blueprint $table) {
            $table->foreignUuid('book_id')
                ->constrained('books')
                ->cascadeOnDelete();
            $table->foreignUuid('genre_id')
                ->constrained('genres')
                ->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['book_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_genres');
    }
};
