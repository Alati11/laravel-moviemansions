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
        Schema::create('building_sponsorship', function (Blueprint $table) {

            $table->unsignedBigInteger('building_id');
            $table->foreign('building_id')
                ->references('id')
                ->on('buildings');

            $table->unsignedBigInteger('sponsorship_id');
            $table->foreign('sponsorship_id')->references('id')->on('sponsorships');

            $table->datetime('starting_date');
            $table->datetime('ending_date');

            $table->primary(['building_id', 'sponsorship_id', 'starting_date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building_sponsorship');
    }
};
