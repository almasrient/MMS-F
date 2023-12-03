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
        Schema::create('kariahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('negara_id')->constrained()->cascadeOnDelete();
            $table->foreignId('negeri_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bandar_id')->constrained()->cascadeOnDelete();
            $table->string('name_kariah');
            $table->string('alamat');
            $table->char('poskod');
            $table->date('tarikh_daftar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kariahs');
    }
};
