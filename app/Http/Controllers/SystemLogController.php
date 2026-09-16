<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemLogController extends Controller
{
    public function index()
    {
        $logs = [
            ['id' => 1, 'user' => 'Dr. Ahmet Yılmaz', 'action' => 'Reçete Oluşturdu', 'ip' => '192.168.1.45', 'date' => '21/08/2026 09:15', 'level' => 'INFO'],
            ['id' => 2, 'user' => 'Sekreter Ayşe', 'action' => 'Yeni Randevu Eklendi', 'ip' => '192.168.1.12', 'date' => '21/08/2026 10:02', 'level' => 'INFO'],
            ['id' => 3, 'user' => 'Sistem', 'action' => 'Başarısız Giriş Denemesi', 'ip' => '185.220.101.5', 'date' => '21/08/2026 11:40', 'level' => 'WARNING'],
        ];

        return view('system_logs.index', compact('logs'));
    }
}