<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raporlama ve Veri Dışa Aktarımı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Raporlama ve Otomatik Veri Dışa Aktarımı (Export)</h3>
                <p class="text-muted small mb-0">Klinik verilerinin Excel, PDF ve CSV formatlarında dışa aktarılması</p>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center p-3">
                    <i class="bi bi-file-earmark-excel fs-1 text-success mb-2"></i>
                    <h6 class="fw-bold">Excel (XLSX) Raporu</h6>
                    <button class="btn btn-sm btn-success mt-2"><i class="bi bi-download me-1"></i> İndir</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center p-3">
                    <i class="bi bi-file-earmark-pdf fs-1 text-danger mb-2"></i>
                    <h6 class="fw-bold">PDF Raporu</h6>
                    <button class="btn btn-sm btn-danger mt-2"><i class="bi bi-download me-1"></i> İndir</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center p-3">
                    <i class="bi bi-file-earmark-text fs-1 text-primary mb-2"></i>
                    <h6 class="fw-bold">CSV Veri Aktarımı</h6>
                    <button class="btn btn-sm btn-primary mt-2"><i class="bi bi-download me-1"></i> İndir</button>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-clock-history me-2"></i>Son Dışa Aktarım Geçmişi</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Rapor Türü</th>
                            <th>Format</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exportLogs as $log)
                        <tr>
                            <td>{{ $log['id'] }}</td>
                            <td class="fw-bold">{{ $log['type'] }}</td>
                            <td><span class="badge bg-secondary">{{ $log['format'] }}</span></td>
                            <td>{{ $log['date'] }}</td>
                            <td><span class="badge bg-success">{{ $log['status'] }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>