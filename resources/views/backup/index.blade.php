<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yedekleme ve Veri Dışa Aktarım Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">Veritabanı Yedekleme ve Dışa Aktarım Paneli</h3>
            <p class="text-muted small m-0">Sistem verilerinin güvenliği için SQL yedekleri ve Excel/CSV export işlemleri</p>
        </div>
        <div>
            <button class="btn btn-success btn-sm shadow-sm me-2">
                <i class="bi bi-file-earmark-excel me-1"></i> Excel Dışa Aktar
            </button>
            <button class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-database-fill-down me-1"></i> Yeni SQL Yedeği Al
            </button>
        </div>
    </div>

    <!-- Yedekleme Log Tablosu -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 border-0">
            <h6 class="m-0 fw-bold text-dark">Mevcut Yedekler ve Dışa Aktarılan Dosyalar</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="table-light">
                        <tr>
                            <th>Dosya Adı</th>
                            <th>Yedek Türü</th>
                            <th>Boyut</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($backups as $backup)
                        <tr>
                            <td class="fw-semibold text-dark"><i class="bi bi-file-zip me-2 text-primary"></i>{{ $backup['filename'] }}</td>
                            <td><span class="badge bg-secondary px-2 py-1">{{ $backup['type'] }}</span></td>
                            <td class="text-muted">{{ $backup['size'] }}</td>
                            <td class="text-muted">{{ $backup['date'] }}</td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-download"></i> İndir</button>
                            </td>
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