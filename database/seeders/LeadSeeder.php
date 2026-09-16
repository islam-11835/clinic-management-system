<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        Lead::create([
            'full_name' => 'Ahmet Yılmaz',
            'email' => 'ahmet@example.com',
            'phone' => '05551234567',
            'source' => 'Website',
            'service_interested' => 'Dental Care',
            'status' => 'New',
        ]);
    }
}