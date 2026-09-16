<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'amount'       => 'required|numeric',
            'status'       => 'required|string',
            'invoice_date' => 'required|date',
        ]);

        return redirect()->back()->with('success', 'Fatura başarıyla sisteme eklendi ve kaydedildi.');
    }
}