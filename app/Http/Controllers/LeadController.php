<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    // عرض قائمة الـ Leads
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    // تحديث حالة الـ Lead
    public function updateStatus(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $lead->status = $request->status;
        $lead->save();

        return redirect()->back()->with('success', 'Lead status updated successfully!');
    }
}