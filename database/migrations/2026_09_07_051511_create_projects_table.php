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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('primary_link_label')->nullable();  // "Live", "TestFlight"
            $table->string('primary_link_url')->nullable();
            $table->string('secondary_link_label')->nullable(); // "Code"
            $table->string('secondary_link_url')->nullable();
            $table->string('submitted_to_name')->nullable();    // "0G APAC Hackathon"
            $table->string('submitted_to_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
