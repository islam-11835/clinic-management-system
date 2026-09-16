<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalRecord;

class MedicalRecordSeeder extends Seeder
{
    public function run(): void
    {
        MedicalRecord::create([
            'hasta_adi' => 'Ahmet Yılmaz',
            'doktor_adi' => 'Dr. Mehmet Öz',
            'teshis' => 'Akut Faranjit',
            'tedavi_plani' => 'Antibiyotik tedavisi ve 3 gün istirahat önerildi.',
            'muayene_tarihi' => '2026-07-24',
        ]);

        MedicalRecord::create([
            'hasta_adi' => 'Ayşe Demir',
            'doktor_adi' => 'Dr. Zeynep Kaya',
            'teshis' => 'Hipertansiyon Kontrolü',
            'tedavi_plani' => 'Diyet düzenlemesi ve günlük tansiyon takibi istendi.',
            'muayene_tarihi' => '2026-07-24',
        ]);
    }
}