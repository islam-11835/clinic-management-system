<?php

namespace App\Http\Controllers;

use App\Models\LabTest;
use Illuminate\Http\Request;

class LabTestController extends Controller
{
    public function index(Request $request)
    {
        $query = LabTest::query();

        // Filter by status if provided
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search by patient name or test name
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('patient_name', 'like', "%{$search}%")
                  ->orWhere('test_name', 'like', "%{$search}%");
            });
        }

        $tests = $query->get();

        $totalTests = LabTest::count();
        $completedTests = LabTest::where('status', 'Tamamlandı')->count();
        $pendingTests = LabTest::where('status', 'Bekliyor')->count();

        return view('lab_tests.index', compact('tests', 'totalTests', 'completedTests', 'pendingTests'));
    }
}