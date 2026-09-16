<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $totalInvoices = $invoices->count();
        $paidAmount = $invoices->where('odeme_durumu', 'Ödendi')->sum('tutar');
        $pendingAmount = $invoices->where('odeme_durumu', 'Bekliyor')->sum('tutar');

        return view('invoices.index', compact('invoices', 'totalInvoices', 'paidAmount', 'pendingAmount'));
    }
}