<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportExportController extends Controller
{
    public function index()
    {
        $exportLogs = [
            ['id' => 1, 'type' => 'Hasta Listesi', 'format' => 'XLSX (Excel)', 'date' => '20/08/2026 10:15', 'status' => 'Tamamlandı'],
            ['id' => 2, 'type' => 'Aylık Fatura Raporu', 'format' => 'PDF', 'date' => '20/08/2026 11:30', 'status' => 'Tamamlandı'],
            ['id' => 3, 'type' => 'Reçete ve İlaç Geçmişi', 'format' => 'CSV', 'date' => '20/08/2026 14:00', 'status' => 'Tamamlandı'],
        ];

        return view('reports_export.index', compact('exportLogs'));
    }
}