<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        return view('medical_records.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name'  => 'required|string|max:255',
            'diagnosis'    => 'required|string',
            'treatment'    => 'required|string',
        ]);

        return redirect()->back()->with('success', 'Tıbbi kayıt başarıyla sisteme eklendi.');
    }
}