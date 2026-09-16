<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::query();

        // Filter by status (durum)
        if ($request->has('durum') && $request->durum != '') {
            $query->where('durum', $request->durum);
        }

        // Search by patient name or doctor name
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('hasta_adi', 'like', "%{$search}%")
                  ->orWhere('doktor_adi', 'like', "%{$search}%");
            });
        }

        $appointments = $query->get();

        $totalAppointments = Appointment::count();
        $confirmedAppointments = Appointment::where('durum', 'Onaylandı')->count();
        $pendingAppointments = Appointment::where('durum', 'Bekliyor')->count();

        return view('appointments.index', compact('appointments', 'totalAppointments', 'confirmedAppointments', 'pendingAppointments'));
    }
}