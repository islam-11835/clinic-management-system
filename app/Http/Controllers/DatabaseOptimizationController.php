<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseOptimizationController extends Controller
{
    public function index()
    {
        return view('database_optimization.index');
    }
}