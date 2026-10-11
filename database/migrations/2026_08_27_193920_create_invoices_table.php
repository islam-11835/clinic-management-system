<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->decimal('amount', 10, 2)->default(0);
            $table->string('status')->default('Bekliyor');
            $table->date('invoice_date')->nullable();
            $table->string('odeme_durumu')->default('Bekliyor');
            $table->decimal('tutar', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};