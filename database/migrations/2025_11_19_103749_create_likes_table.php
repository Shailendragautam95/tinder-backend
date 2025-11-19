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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_person_id');
            $table->unsignedBigInteger('to_person_id');
            $table->boolean('is_liked')->nullable();
            $table->timestamps();

            $table->unique(['from_person_id', 'to_person_id']);

            $table->foreign('from_person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('to_person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
