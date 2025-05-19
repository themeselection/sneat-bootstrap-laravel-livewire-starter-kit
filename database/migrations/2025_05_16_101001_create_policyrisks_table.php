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
        Schema::create('policyrisks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('regno');
            $table->string('engineno');
            $table->string('chassisno');
            $table->string('vehiclemake');
            $table->string('vehiclemodel')->nullable();
            $table->integer('yearofmake');
            $table->string('vehiclecolor');
            $table->float('contribution',2);      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policyrisks');
    }
};
