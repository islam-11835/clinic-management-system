<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Güvenlik ve Yetkilendirme Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">Sistem Güvenlik ve Yetkilendirme Paneli</h3>
            <p class="text-muted small m-0">XSS, CSRF, SQL Injection koruması ve RBAC denetim kayıtları</p>
        </div>
        <button class="btn btn-outline-danger btn-sm shadow-sm">
            <i class="bi bi-shield-lock-fill me-1"></i> Güvenlik Taramasını Başlat
        </button>
    </div>

    <!-- Güvenlik Özet Kartları -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-success border-4">
                <div class="text-muted small">CSRF Koruması</div>
                <div class="fs-5 fw-bold text-success">Aktif / %100</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-info border-4">
                <div class="text-muted small">XSS Sanitization</div>
                <div class="fs-5 fw-bold text-info">Aktif (Blade Encoded)</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-warning border-4">
                <div class="text-muted small">Rol Tabanlı Erişim (RBAC)</div>
                <div class="fs-5 fw-bold text-warning">4 Aktif Rol</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-danger border-4">
                <div class="text-muted small">Engellenen Şüpheli İstekler</div>
                <div class="fs-5 fw-bold text-danger">12 İstek</div>
            </div>
        </div>
    </div>

    <!-- Güvenlik Log Tablosu -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 border-0">
            <h6 class="m-0 fw-bold text-dark">Son Güvenlik Denetim ve Log Kayıtları</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="table-light">
                        <tr>
                            <th>Denetim / İşlem Tipi</th>
                            <th>Durum</th>
                            <th>IP Adresi</th>
                            <th>Tarih / Saat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($securityLogs as $log)
                        <tr>
                            <td class="fw-semibold text-dark">{{ $log['type'] }}</td>
                            <td><span class="badge bg-{{ $log['badge'] }} px-2 py-1">{{ $log['status'] }}</span></td>
                            <td class="text-muted">{{ $log['ip'] }}</td>
                            <td class="text-muted">{{ $log['time'] }}</td>
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