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
        // Añadimos la columna author_id a la tabla books
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable(); 
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
