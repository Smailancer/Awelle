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
        Schema::create('correction_suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('word_id')->constrained()->cascadeOnDelete();
            $table->string('term')->nullable();
            $table->string('standard')->nullable();
            $table->string('spell')->nullable();
            $table->string('tifinagh')->nullable();
            $table->string('type')->nullable();
            $table->text('uses')->nullable();
            $table->text('ar_meaning')->nullable();
            $table->text('fr_meaning')->nullable();
            $table->text('en_meaning')->nullable();
            $table->text('exemple')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correction_suggestions');
    }
};
