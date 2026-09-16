<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('hasta_adi');
            $table->string('doktor_adi');
            $table->date('randevu_tarihi');
            $table->time('randevu_saati');
            $table->string('poliklinik');
            $table->enum('durum', ['Onaylandı', 'Bekliyor', 'İptal'])->default('Bekliyor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};