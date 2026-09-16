<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Performans ve Optimizasyon Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">Sistem Performans ve Optimizasyon Paneli</h3>
            <p class="text-muted small m-0">N+1 sorgu çözümleri, indeksleme ve yanıt süresi metrikleri</p>
        </div>
        <button class="btn btn-outline-primary btn-sm shadow-sm">
            <i class="bi bi-speedometer2 me-1"></i> Performans Testi Çalıştır
        </button>
    </div>

    <!-- Performans Tablosu -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 border-0">
            <h6 class="m-0 fw-bold text-dark">İyileştirme ve Metrik Detayları</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="table-light">
                        <tr>
                            <th>Optimizasyon / Metrik Kriteri</th>
                            <th>Durum</th>
                            <th>Performans Etkisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($metrics as $item)
                        <tr>
                            <td class="fw-semibold text-dark">{{ $item['metric'] }}</td>
                            <td><span class="badge bg-{{ $item['badge'] }} px-2 py-1">{{ $item['status'] }}</span></td>
                            <td class="text-muted fw-bold">{{ $item['impact'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>