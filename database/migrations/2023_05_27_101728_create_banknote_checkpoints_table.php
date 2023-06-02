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
        Schema::create('banknote_checkpoints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banknote_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->string('longitude');
            $table->string('latitude');

            $table->longText('comment');
            $table->longText('image_path');
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
