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
        Schema::create('orga_kariahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ahli_kariah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kariah_id')->constrained()->cascadeOnDelete();
            $table->date('tarikh_lantikan');
            $table->date('tarikh_tamat');
            $table->string('jawatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orga_kariahs');
    }
};
