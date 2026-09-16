<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proje Tamamlama ve Son Denetim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="text-center my-4">
            <h2 class="fw-bold text-success"><i class="bi bi-check-circle-fill me-2"></i>CMS+ Projesi Başarıyla Tamamlandı</h2>
            <p class="text-muted">Tüm modüller entegre edildi, testler doğrulandı ve sistem yayına hazır hale getirildi.</p>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Modül Entegrasyon ve Durum Raporu</h6>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach($systemModules as $module)
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span class="fw-semibold">{{ $module['name'] }}</span>
                        <div>
                            <span class="badge bg-success me-2">{{ $module['status'] }}</span>
                            <span class="badge bg-secondary">{{ $module['code'] }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>