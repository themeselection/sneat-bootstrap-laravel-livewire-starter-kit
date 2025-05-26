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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('policyno')->nullable();
            $table->integer('insured_id');
            $table->string('insured_name');
            $table->integer('agent_id')->nullable();
            $table->string('status')->default('draft');
            $table->string('naicom_uid')->nullable();
            $table->string('naicom_status')->nullable();
            $table->string('niid_status')->nullable();
            $table->string('niip_status')->nullable();
            $table->string('elite_msg')->nullable();
            $table->float('commission',2)->nullable();
            $table->float('contribution',2)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('create_uid');
            $table->integer('update_uid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
