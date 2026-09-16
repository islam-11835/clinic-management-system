<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genel Sistem Durumu ve Entegrasyon Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">Sistem Entegrasyon ve Genel Durum Paneli</h3>
            <p class="text-muted small m-0">Tüm modüllerin canlıya alım öncesi son doğrulama ve test sonuçları</p>
        </div>
        <span class="badge bg-success fs-6 px-3 py-2"><i class="bi bi-check-circle-fill me-1"></i> Sistem Canlıya Hazır</span>
    </div>

    <!-- Entegrasyon Tablosu -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 border-0">
            <h6 class="m-0 fw-bold text-dark">Modül Entegrasyon Test Sonuçları</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="table-light">
                        <tr>
                            <th>Modül Adı</th>
                            <th>Entegrasyon Durumu</th>
                            <th>Açıklama / Test Detayı</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $test)
                        <tr>
                            <td class="fw-semibold text-dark">{{ $test['module'] }}</td>
                            <td><span class="badge bg-{{ $test['badge'] }} px-2 py-1"><i class="bi bi-check2 me-1"></i>{{ $test['status'] }}</span></td>
                            <td class="text-muted">{{ $test['details'] }}</td>
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