<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LabTest;

class LabTestSeeder extends Seeder
{
    public function run(): void
    {
        LabTest::create([
            'patient_name' => 'Ahmet Yılmaz',
            'test_name' => 'Tam Kan Sayımı (Hemogram)',
            'category' => 'Hematoloji',
            'result' => 'Normal',
            'status' => 'Tamamlandı',
        ]);

        LabTest::create([
            'patient_name' => 'Ayşe Demir',
            'test_name' => 'Açlık Kan Şekeri',
            'category' => 'Biyokimya',
            'result' => 'Sonuç Bekleniyor',
            'status' => 'Bekliyor',
        ]);
    }
}