<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::all();
        $totalPrescriptions = $prescriptions->count();
        $activePrescriptions = $totalPrescriptions;

        return view('prescriptions.index', compact('prescriptions', 'totalPrescriptions', 'activePrescriptions'));
    }
}