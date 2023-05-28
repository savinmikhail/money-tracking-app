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
        Schema::create('banknote-params', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banknote_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('location');
            $table->longText('comment');
            $table->foreignId('image_id')->constrained('images')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banknote-params');
    }
};
