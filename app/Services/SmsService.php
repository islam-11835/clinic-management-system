<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    /**
     * Hastaya SMS ile randevu doğrulama ve bilgilendirme mesajı gönderir.
     */
    public function sendAppointmentSms(string $phone, string $patientName, string $appointmentDate): bool
    {
        $message = "Sayın {$patientName}, klinik randevunuz {$appointmentDate} tarihine onaylanmıştır.";

        try {
            // Harici SMS Gateway API İsteği
            $response = Http::post('https://api.sms-provider.com/v1/send', [
                'api_key' => config('services.sms.key'),
                'to'      => $phone,
                'message' => $message,
            ]);

            if ($response->successful()) {
                Log::info("SMS Başarıyla Gönderildi: {$phone}");
                return true;
            }

            Log::error("SMS Gönderim Hatası: " . $response->body());
            return false;
        } catch (\Exception $e) {
            Log::error("SMS Servis Bağlantı Hatası: " . $e->getMessage());
            return false;
        }
    }
}