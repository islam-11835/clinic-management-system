<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        Appointment::create([
            'hasta_adi' => 'Ahmet Yılmaz',
            'doktor_adi' => 'Dr. Mehmet Öz',
            'randevu_tarihi' => '2026-07-22',
            'randevu_saati' => '10:30:00',
            'poliklinik' => 'Ağız ve Diş Sağlığı',
            'durum' => 'Onaylandı',
        ]);

        Appointment::create([
            'hasta_adi' => 'Ayşe Demir',
            'doktor_adi' => 'Dr. Zeynep Kaya',
            'randevu_tarihi' => '2026-07-22',
            'randevu_saati' => '14:00:00',
            'poliklinik' => 'Dahiliye',
            'durum' => 'Bekliyor',
        ]);
    }
}