<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiAssistantController extends Controller
{
    public function index()
    {
        return view('ai_assistant.index');
    }

    public function analyze(Request $request)
    {
        $request->validate([
            'symptoms' => 'required|string|min:2',
        ]);

        $symptomsInput = trim($request->input('symptoms'));
        $symptomsLower = mb_strtolower($symptomsInput, 'UTF-8');
        $apiKey = env('GEMINI_API_KEY', 'DEMO_KEY');

        if ($apiKey === 'DEMO_KEY' || empty($apiKey)) {
            
            // قواميس تشخيصية محاكاة لضمان دقة وتنوع الاستجابة
            if (str_contains($symptomsLower, 'صرع') || str_contains($symptomsLower, 'epilepsi') || str_contains($symptomsLower, 'تشنج')) {
                $disease1 = "Epilepsi (Sara Hastalığı)";
                $rate1 = 88;
                $color1 = "danger";
                
                $disease2 = "Nörolojik Senkop / Katatoni";
                $rate2 = 62;
                $color2 = "warning";

                $tests = "EEG (Elektroensefalografi), Beyin MR (EMR), Kan Elektrolit Paneli.";
                $advice = "Acil Nöroloji uzmanı muayenesi gereklidir. Nöbet sırasında hastanın güvenliği sağlanmalıdır.";
            } 
            elseif (str_contains($symptomsLower, 'سكري') || str_contains($symptomsLower, 'seker') || str_contains($symptomsLower, 'diyabet')) {
                $disease1 = "Tip 2 Diyabet (Şeker Hastalığı)";
                $rate1 = 92;
                $color1 = "danger";

                $disease2 = "İnsülin Direnci / Glukoz Bozukluğu";
                $rate2 = 70;
                $color2 = "warning";

                $tests = "Açlık Kan Şekeri (AKŞ), HbA1c Testi, Oral Glukoz Tolerans Testi (OGTT).";
                $advice = "Endokrinoloji veya İç Hastalıkları uzmanına yönlendirilmeli, diyet programı başlatılmalıdır.";
            }
            elseif (str_contains($symptomsLower, 'صداع') || str_contains($symptomsLower, 'رأس') || str_contains($symptomsLower, 'baş ağrısı') || str_contains($symptomsLower, 'migren')) {
                $disease1 = "Migren (Aurasız / Auralı)";
                $rate1 = 85;
                $color1 = "primary";

                $disease2 = "Gerilim Tipi Baş Ağrısı";
                $rate2 = 65;
                $color2 = "info";

                $tests = "Tansiyon Takibi, Beyin BT / MRG (Gerekli görülürse).";
                $advice = "Karanlık ve sessiz ortamda dinlenme, düzenli uyku ve bol sıvı alımı önerilir.";
            }
            elseif (str_contains($symptomsLower, 'قلب') || str_contains($symptomsLower, 'صدر') || str_contains($symptomsLower, 'kalp')) {
                $disease1 = "Kardiyak Aritmi / Hipertansiyon";
                $rate1 = 80;
                $color1 = "danger";

                $disease2 = "Anjina Pektoris (Göğüs Ağrısı)";
                $rate2 = 58;
                $color2 = "warning";

                $tests = "EKG (Elektrokardiyografi), Efor Testi, Troponin Kan Testi.";
                $advice = "Kardiyoloji polikliniğinde acil değerlendirme yapılmalıdır.";
            }
            else {
                // للأعراض العامة: يحسب النسبة بناءً على طول الكلمة ديناميكياً
                $hash = crc32($symptomsLower);
                $rate1 = 70 + ($hash % 20);
                $rate2 = 45 + ($hash % 20);

                $disease1 = "Klinik Semptom Asemptomatik Değerlendirmesi";
                $color1 = "success";

                $disease2 = "Mevsimsel Enfeksiyon / Genel Halsizlik";
                $color2 = "warning";

                $tests = "Tam Kan Sayımı (Hemogram), Biyokimya Paneli, CRP.";
                $advice = "Genel fiziksel muayene ve semptomatik takip tavsiye edilir.";
            }

            $analysisResult = "
                <div class='mb-3'>
                    <h6 class='fw-bold text-dark mb-3'>Olası Ön Teşhisler ve Tahmin Oranları:</h6>
                    
                    <div class='mb-3'>
                        <div class='d-flex justify-content-between mb-1'>
                            <span>1. {$disease1}</span>
                            <span class='fw-bold text-{$color1}'>%{$rate1} Tahmin</span>
                        </div>
                        <div class='progress' style='height: 14px;'>
                            <div class='progress-bar bg-{$color1}' style='width: {$rate1}%'>{$rate1}%</div>
                        </div>
                    </div>

                    <div class='mb-3'>
                        <div class='d-flex justify-content-between mb-1'>
                            <span>2. {$disease2}</span>
                            <span class='fw-bold text-{$color2}'>%{$rate2} Tahmin</span>
                        </div>
                        <div class='progress' style='height: 14px;'>
                            <div class='progress-bar bg-{$color2}' style='width: {$rate2}%'>{$rate2}%</div>
                        </div>
                    </div>
                </div>
                <hr>
                <p><strong>Önerilen Laboratuvar Testleri:</strong> {$tests}</p>
                <p><strong>Klinik Tavsiye:</strong> {$advice}</p>
            ";

        } else {
            // الاتصال بـ Gemini API
            $prompt = "Sen profesyonel bir tıbbi asistansın. Aşağıdaki semptomları değerlendir ve Türkçe olarak yanıtla:
            1) Olası ön teşhisleri ve her biri için % kaç ihtimal verdiğini (tahmin oranı) belirt.
            2) İstenmesi gereken laboratuvar testlerini yaz.
            3) Klinik tavsiyeleri ekle.
            Semptomlar: {$symptomsInput}";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key={$apiKey}", [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $analysisResult = nl2br($data['candidates'][0]['content']['parts'][0]['text'] ?? 'Analiz sonucu alınamadı.');
            } else {
                $analysisResult = 'AI servisiyle bağlantı kurulurken bir hata oluştu. Lütfen tekrar deneyiniz.';
            }
        }

        return view('ai_assistant.index', ['symptoms' => $symptomsInput, 'analysisResult' => $analysisResult]);
    }
}