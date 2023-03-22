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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id');
            $table->foreignId('property_type_id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->string('size');
            $table->string('description');
            $table->char('council_tax_band', 1);
            $table->integer('price');
            $table->string('currency');
            $table->integer('tenure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
