<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;

class PrescriptionSeeder extends Seeder
{
    public function run(): void
    {
        Prescription::create([
            'patient_name' => 'Ahmet Yılmaz',
            'doctor_name' => 'Dr. Mehmet Öz',
            'diagnosis' => 'Diş Çürüğü',
            'medicines' => 'Parasetamol 500mg, Amoksisilin 500mg',
            'status' => 'active',
        ]);

        Prescription::create([
            'patient_name' => 'Ayşe Demir',
            'doctor_name' => 'Dr. Zeynep Kaya',
            'diagnosis' => 'Grip Enfeksiyonu',
            'medicines' => 'Ibuprofen 400mg',
            'status' => 'pending',
        ]);
    }
}