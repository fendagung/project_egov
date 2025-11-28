<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // <-- Perhatikan sintaks ': void' untuk Laravel 9/10/11
    {
        Schema::create('antrian_surat', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian')->unique();
            $table->string('nama');
            $table->string('jenis_surat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian_surat');
    }
};