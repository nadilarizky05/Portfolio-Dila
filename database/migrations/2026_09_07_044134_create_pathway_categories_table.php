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
        Schema::create('pathway_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pathway_id')->constrained()->cascadeOnDelete();
            $table->string('name'); // 3D Animator, Web Designer, dst
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathway_categories');
    }
};
