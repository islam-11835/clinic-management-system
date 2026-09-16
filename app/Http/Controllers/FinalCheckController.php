<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinalCheckController extends Controller
{
    public function index()
    {
        $systemModules = [
            ['name' => 'Hasta ve Lead Yönetimi', 'status' => 'Tamamlandı', 'code' => '100%'],
            ['name' => 'Randevu ve Reçete Modülü', 'status' => 'Tamamlandı', 'code' => '100%'],
            ['name' => 'Laboratuvar Testleri ve Raporlama', 'status' => 'Tamamlandı', 'code' => '100%'],
            ['name' => 'Yapay Zekâ Ön Teşhis Asistanı', 'status' => 'Entegre Edildi', 'code' => '100%'],
            ['name' => 'Güvenlik ve Log Altyapısı', 'status' => 'Doğrulandı', 'code' => '100%'],
        ];

        return view('final_check.index', compact('systemModules'));
    }
}