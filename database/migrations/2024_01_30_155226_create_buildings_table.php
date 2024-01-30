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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null')
            ->onUpdate('cascade');
            $table->string('title');
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('beds');
            $table->unsignedInteger('bathrooms');
            $table->unsignedInteger('sqm');
            $table->unsignedInteger('latitude');
            $table->unsignedInteger('longitude');
            $table->text('description');
            $table->string('address');
            $table->string('image');
            $table->boolean('available');
            $table->string('slug')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
