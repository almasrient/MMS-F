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
        Schema::table('kariahs', function (Blueprint $table) {
            $table->char('no_tel');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kariahs', function (Blueprint $table) {
            $table->dropColumn('no_tel');
            $table->dropColumn('email');
        });
    }
};
