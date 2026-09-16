<?php

namespace App\Http\Controllers;

use App\Models\TestCategory;
use Illuminate\Http\Request;

class TestCategoryController extends Controller
{
    // هذه هي الدالة التي كانت ناقصة وتسبب الخطأ
    public function index()
    {
        return view('test_categories.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        TestCategory::create([
            'name' => $request->name,
            'department' => $request->department,
            'icon' => $request->icon ?? 'bi-folder',
        ]);

        return redirect()->back()->with('success', 'Yeni test kategorisi eklendi.');
    }
}