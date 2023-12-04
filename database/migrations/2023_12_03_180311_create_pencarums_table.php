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
        Schema::create('pencarums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ahli_kariah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('caruman_id')->constrained()->cascadeOnDelete();
            $table->date('tarikh_pembayaran');
            $table->string('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencarums');
    }
};
