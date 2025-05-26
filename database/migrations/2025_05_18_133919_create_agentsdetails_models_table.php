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
        Schema::create('agentsdetails_models', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->unique();
            $table->boolean('allowcredit')->default(false);
            $table->integer('noallocated')->default(0);
            $table->integer('noused')->default(0);
            $table->string('auth_token')->nullable();
            $table->string('status')->default('deactivated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agentsdetails_models');
    }
};
