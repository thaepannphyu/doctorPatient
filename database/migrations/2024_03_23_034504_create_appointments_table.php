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
        Schema::create('appointments', function (Blueprint $table) {
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->references('id')->on('doctor_profiles')->onDelete('cascade');
            $table->text("symptoms")->nullable();
            $table->date("date");
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
