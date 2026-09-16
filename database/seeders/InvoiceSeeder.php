<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        Invoice::create([
            'hasta_adi' => 'Ahmet Yılmaz',
            'hizmet_adi' => 'Diş Muayenesi ve Dolgu',
            'tutar' => 1200.00,
            'odeme_durumu' => 'Ödendi',
            'fatura_tarihi' => '2026-07-27',
        ]);

        Invoice::create([
            'hasta_adi' => 'Ayşe Demir',
            'hizmet_adi' => 'Dahiliye Muayenesi ve Kan Testi',
            'tutar' => 850.00,
            'odeme_durumu' => 'Bekliyor',
            'fatura_tarihi' => '2026-07-27',
        ]);
    }
}