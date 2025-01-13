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
        Schema::create('academician_grant', function (Blueprint $table) {
            $table->id();

            $table->foreignId('academician_id')->constrained('academicians');
            $table->foreignId('grant_id')->constrained('grants');

            $table->string('role')->default('member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academician_grant');
    }
};
