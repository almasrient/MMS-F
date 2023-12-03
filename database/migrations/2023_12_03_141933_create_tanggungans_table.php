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
        Schema::create('tanggungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('negara_id')->constrained()->cascadeOnDelete();
            $table->foreignId('negeri_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bandar_id')->constrained()->cascadeOnDelete();
            $table->string('name_penuh');
            $table->string('nric');
            $table->char('no_tel');
            $table->string('email');
            $table->string('alamat');
            $table->char('poskod');
            $table->foreignId('ahli_kariah_id')->constrained()->cascadeOnDelete();
            $table->date('tarikh_lahir');
            $table->date('tarikh_meninggal');
            $table->date('tarikh_daftar');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggungans');
    }
};
