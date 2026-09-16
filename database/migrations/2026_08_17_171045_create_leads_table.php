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
    Schema::create('leads', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('source')->default('Website'); // مصدر العميل
        $table->string('service_interested')->nullable(); // الخدمة المطلوبة
        $table->enum('status', ['New', 'Contacted', 'Converted', 'Cancelled'])->default('New'); // حالة العميل
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
