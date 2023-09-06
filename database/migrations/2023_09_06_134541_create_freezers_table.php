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
        Schema::create('freezers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('type');
            $table->string('specimen_type');
            $table->string('merk');
            $table->string('model')->nullable();
            $table->float('capacity')->nullable();
            $table->integer('calibration_time')->nullable();
            $table->string('bmn')->nullable();
            $table->string('location');
            $table->string('status');
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freezers');
    }
};
