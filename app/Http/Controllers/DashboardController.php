<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\LabTest;
use App\Models\MedicalRecord;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAppointments = Appointment::count();
        $totalLabTests = LabTest::count();
        $totalRecords = MedicalRecord::count();
        $totalInvoices = Invoice::count();
        $totalRevenue = Invoice::where('odeme_durumu', 'Ödendi')->sum('tutar');

        return view('dashboard', compact(
            'totalAppointments', 
            'totalLabTests', 
            'totalRecords', 
            'totalInvoices', 
            'totalRevenue'
        ));
    }
}