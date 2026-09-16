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
    Schema::create('medical_records', function (Blueprint $table) {
        $table->id();
        $table->string('hasta_adi');        // Hasta Adı
        $table->string('doktor_adi');       // Doktor Adı
        $table->string('teshis');           // Teşhis (Diagnosis)
        $table->text('tedavi_plani');       // Tedavi Planı
        $table->date('muayene_tarihi');     // Muayene Tarihi
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
