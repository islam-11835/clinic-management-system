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
    Schema::create('lab_tests', function (Blueprint $table) {
        $table->id();
        $table->string('patient_name'); // Hasta Adı
        $table->string('test_name');    // Test Adı (ör: Kan Sayımı, Biyokimya)
        $table->string('category');     // Kategori
        $table->string('result');       // Sonuç
        $table->enum('status', ['Tamamlandı', 'Bekliyor', 'İptal'])->default('Bekliyor');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_tests');
    }
};
