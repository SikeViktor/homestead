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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('breed_id')->foreign('breed_id')->references('id')->on('breeds');         
            $table->string('gender');
            $table->text('description');
            $table->string('color');
            $table->year('birth_of_year');
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('owner_id')->foreign('owner_id')->references('id')->on('users'); 
            $table->boolean('alive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
