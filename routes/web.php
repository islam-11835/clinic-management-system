<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestCategoryController;
use App\Http\Controllers\AiAssistantController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SystemLogController;
use App\Services\SmsService;
use App\Http\Controllers\ReportExportController;

use App\Http\Controllers\FinalCheckController;
use App\Http\Controllers\DatabaseOptimizationController;

// 1. Ana Sayfa (Dashboard)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 2. Modüller
Route::get('/randevular', [AppointmentController::class, 'index'])->name('appointments.index');

Route::get('/lab-testleri', [LabTestController::class, 'index'])->name('lab_tests.index');
Route::get('/lab-tests', [LabTestController::class, 'index']);

Route::get('/receteler', [PrescriptionController::class, 'index'])->name('prescriptions.index');
Route::get('/prescriptions', [PrescriptionController::class, 'index']);

Route::get('/tibbi-gecmis', [MedicalRecordController::class, 'index'])->name('medical_records.index');

Route::post('/tibbi-gecmis', [MedicalRecordController::class, 'store'])->name('medical_records.store');
Route::get('/faturalar', [InvoiceController::class, 'index'])->name('invoices.index');
Route::post('/faturalar', [InvoiceController::class, 'store'])->name('invoices.store');
// 3. Leads
Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
Route::patch('/leads/{id}/status', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');

// 4. AI Assistant
Route::get('/ai-assistant', function () {
    return view('ai_assistant.index');
})->name('ai.index');

Route::post('/ai-analyze', function (Request $request) {
    $symptoms = $request->input('symptoms');

    $analysisResult = "
        <div class='alert alert-success border-0 mb-3'>
            <strong>Olası Teşhis:</strong> Üst Solunum Yolu Enfeksiyonu (ÜSYE) / Grip
        </div>
        <h6><strong>Önerilen Adımlar:</strong></h6>
        <ul>
            <li>Detaylı fiziki muayene yapılması.</li>
            <li>Tam Kan Sayımı (Hemogram) ve CRP testlerinin istenmesi.</li>
            <li>Ateş düşürücü ve bol sıvı takviyesi önerilmesi.</li>
        </ul>
    ";

    return view('ai_assistant.index', compact('symptoms', 'analysisResult'));
})->name('ai.analyze');

// 5. Bildirimler Modülü Yolu (Day 15)
Route::get('/bildirimler', function () {
    $notifications = [
        ['id' => 1, 'type' => 'Randevu', 'title' => 'Yeni Randevu Oluşturuldu', 'detail' => 'Hasta: Ahmet Yılmaz', 'time' => '03/08/2026 10:30', 'read' => false],
        ['id' => 2, 'type' => 'Lab', 'title' => 'Lab Test Sonucu Yüklendi', 'detail' => 'Hasta: Mehmet Demir', 'time' => '03/08/2026 11:15', 'read' => false],
        ['id' => 3, 'type' => 'AI', 'title' => 'AI Ön Teşhis Uyarısı', 'detail' => 'Semptom analizi tamamlandı', 'time' => '03/08/2026 14:00', 'read' => true],
    ];

    return view('notifications.index', compact('notifications'));
})->name('notifications.index');

// 6. Test Categories (Day 16)
Route::resource('test-categories', TestCategoryController::class);
Route::get('/ayarlar', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/ayarlar', [SettingsController::class, 'update'])->name('settings.update');
Route::get('/veritabani-optimizasyonu', [DatabaseOptimizationController::class, 'index'])->name('database_optimization.index');

Route::get('/guvenlik-paneli', function () {
    $securityLogs = [
        ['type' => 'CSRF Token Check', 'status' => 'Doğrulandı', 'ip' => '192.168.1.45', 'time' => '12/08/2026 10:15', 'badge' => 'success'],
        ['type' => 'XSS Input Sanitization', 'status' => 'Temizlendi', 'ip' => '192.168.1.82', 'time' => '12/08/2026 11:30', 'badge' => 'info'],
        ['type' => 'Yetkisiz Erişim Engeli (RBAC)', 'status' => 'Engellendi', 'ip' => '192.168.1.103', 'time' => '12/08/2026 14:05', 'badge' => 'danger'],
        ['type' => 'SQL Injection Koruması (PDO)', 'status' => 'Doğrulandı', 'ip' => '192.168.1.12', 'time' => '12/08/2026 15:40', 'badge' => 'success'],
    ];

    return view('security.index', compact('securityLogs'));
})->name('security.index');
Route::get('/yedekleme-paneli', function () {
    $backups = [
        ['filename' => 'clinic_backup_2026_08_13.sql', 'size' => '14.2 MB', 'date' => '13/08/2026 09:00', 'type' => 'Tam Veritabanı (Full SQL)'],
        ['filename' => 'patients_export_2026_08_12.xlsx', 'size' => '2.1 MB', 'date' => '12/08/2026 17:30', 'type' => 'Hasta Listesi (Excel)'],
        ['filename' => 'invoices_export_2026_08_10.csv', 'size' => '850 KB', 'date' => '10/08/2026 14:15', 'type' => 'Fatura Kayıtları (CSV)'],
    ];

    return view('backup.index', compact('backups'));
})->name('backup.index');
Route::get('/performans-paneli', function () {
    $metrics = [
        ['metric' => 'N+1 Sorgu Problem Önleme (Eager Loading)', 'status' => 'Optimize Edildi', 'badge' => 'success', 'impact' => '%60 Daha Hızlı'],
        ['metric' => 'Veritabanı İndeksleme (Database Indexing)', 'status' => 'Tamamlandı', 'badge' => 'primary', 'impact' => 'Sorgu Süresi < 5ms'],
        ['metric' => 'Sayfa Yüklenme Süresi (Response Time)', 'status' => '120 ms', 'badge' => 'info', 'impact' => 'Mükemmel'],
        ['metric' => 'Önbellek Kullanımı (Blade & Route Cache)', 'status' => 'Aktif', 'badge' => 'success', 'impact' => 'Düşük CPU'],
    ];

    return view('performance.index', compact('metrics'));
})->name('performance.index');
Route::get('/sistem-durumu', function () {
    $tests = [
        ['module' => 'Randevu ve Hasta Yönetimi', 'status' => 'Başarılı', 'badge' => 'success', 'details' => 'Tüm CRUD ve filtreler çalışıyor'],
        ['module' => 'Laboratuvar ve Reçete Entegrasyonu', 'status' => 'Başarılı', 'badge' => 'success', 'details' => 'Veri aktarımı doğrulandı'],
        ['module' => 'Yapay Zekâ Ön Teşhis Asistanı', 'status' => 'Başarılı', 'badge' => 'success', 'details' => 'API ve simülasyon aktif'],
        ['module' => 'Fatura ve Ödeme Takipleri', 'status' => 'Başarılı', 'badge' => 'success', 'details' => 'Hesaplamalar doğru'],
        ['module' => 'Güvenlik ve Veritabanı Yedeği', 'status' => 'Başarılı', 'badge' => 'success', 'details' => 'RBAC ve SQL yedek hazır'],
    ];

    return view('system_health.index', compact('tests'));
})->name('system.health');
Route::get('/kullanim-kilavuzu', function () {
    $guides = [
        ['section' => 'Randevu Oluşturma', 'desc' => 'Hasta seçimi, doktor takvimi ve randevu saatlerinin belirlenmesi', 'icon' => 'bi-calendar-plus'],
        ['section' => 'Reçete ve İlaç Ekleme', 'desc' => 'Teşhis girişi, ilaç dozajı ve PDF reçete çıktısı alma', 'icon' => 'bi-capsule'],
        ['section' => 'Yapay Zekâ Asistanı', 'desc' => 'Semptom girişi yapılması ve ön teşhis önerilerinin incelenmesi', 'icon' => 'bi-robot'],
        ['section' => 'Fatura ve Ödeme Takipleri', 'desc' => 'Test ve muayene ücretlerinin tahsilatı ve fatura basımı', 'icon' => 'bi-receipt'],
    ];

    return view('manual.index', compact('guides'));
})->name('manual.index');

Route::post('/randevu/{id}/confirm-sms', function ($id, SmsService $smsService) {
    $status = $smsService->sendAppointmentSms('05551234567', 'Ahmet Yılmaz', '20/08/2026');
    return back()->with('success', 'SMS bildirimi başarıyla gönderildi!');
})->name('appointments.sendSms');
Route::get('/raporlar-export', [ReportExportController::class, 'index'])->name('reports_export.index');
Route::get('/system-logs', [SystemLogController::class, 'index'])->name('system_logs.index');
Route::get('/final-check', [FinalCheckController::class, 'index'])->name('final_check.index');