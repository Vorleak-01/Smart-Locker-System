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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
<<<<<<<< HEAD:database/migrations/2026_09_16_040200_create_locations_table.php
            $table->string('type');
========
            $table->string('latitude');
            $table->string('longitude');
            $table->string('map_url');
            $table->string('status');
>>>>>>>> e1cf82c80325adbb4505691e879375f10979560c:database/migrations/2026_09_16_040339_create_lacations_table.php
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2026_09_16_040200_create_locations_table.php
        Schema::dropIfExists('locations');
========
        Schema::dropIfExists('lacations');
>>>>>>>> e1cf82c80325adbb4505691e879375f10979560c:database/migrations/2026_09_16_040339_create_lacations_table.php
    }
};