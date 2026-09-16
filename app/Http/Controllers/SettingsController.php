<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'clinic_name' => 'required|string|max:255',
            'phone'       => 'required|string',
            'email'       => 'required|email',
            'address'     => 'required|string',
        ]);

        return redirect()->back()->with('success', 'Sistem ayarları ve profil bilgileri başarıyla güncellendi.');
    }
}