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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('slug');
            $table->string('tifinagh')->nullable();
            $table->string('term');
            $table->string('type')->nullable();
            $table->string('variants')->nullable();
            $table->text('ar_meaning')->nullable();
            $table->text('fr_meaning')->nullable();
            $table->text('en_meaning')->nullable();
            $table->text('exemple')->nullable();
            $table->binary('audio')->nullable(); // Assuming BLOB for audio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
