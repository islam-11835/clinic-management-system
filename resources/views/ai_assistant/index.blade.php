<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yapay Zekâ Klinik Asistanı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">🤖 Yapay Zekâ Destekli Ön Teşhis Asistanı</h5>
                    <span class="badge bg-light text-primary">Gemini AI / ML Analysis</span>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ai.analyze') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="symptoms" class="form-label fw-bold">Hasta Semptomları ve Şikayetleri:</label>
                            <textarea name="symptoms" id="symptoms" rows="4" class="form-control" 
                                placeholder="Örn: Hastada 3 gündür yüksek ateş, kuru öksürük ve halsizlik var..." required>{{ $symptoms ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">
                            🔍 Semptomları Analiz Et ve Teşhis Tahmin Et
                        </button>
                    </form>

                    @isset($analysisResult)
                        <div class="mt-4 p-4 border rounded bg-white shadow-sm">
                            <h5 class="text-primary border-bottom pb-2 mb-3">🩺 Analiz ve Ön Teşhis Raporu</h5>
                            <div>
                                {!! $analysisResult !!}
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>