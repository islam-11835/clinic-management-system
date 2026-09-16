<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veritabanı Optimizasyonu ve Performans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Veritabanı Optimizasyonu ve Performans Paneli</h3>
                <p class="text-muted small mb-0">Sorgu süreleri, indeksleme durumları ve veritabanı performans analizi</p>
            </div>
            <button class="btn btn-primary">
                <i class="bi bi-speedometer2 me-1"></i> Yeniden Analiz Et
            </button>
        </div>

        <!-- Stat Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-success-subtle text-success p-3 rounded me-3">
                            <i class="bi bi-lightning-charge fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Ortalama Sorgu Süresi</span>
                            <h4 class="fw-bold mb-0">12 ms</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-primary-subtle text-primary p-3 rounded me-3">
                            <i class="bi bi-database-check fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Aktif İndeks Sayısı</span>
                            <h4 class="fw-bold mb-0">18 İndeks</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-info-subtle text-info p-3 rounded me-3">
                            <i class="bi bi-cpu fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Sorgu Önbellek Oranı</span>
                            <h4 class="fw-bold mb-0">%94</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-warning-subtle text-warning p-3 rounded me-3">
                            <i class="bi bi-hdd-network fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Veritabanı Boyutu</span>
                            <h4 class="fw-bold mb-0">24.5 MB</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">İndekslenen Tablolar ve İyileştirme Durumları</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tablo Adı</th>
                            <th>Eklenen İndeks Sütunları</th>
                            <th>Sorgu Tipi</th>
                            <th>Performans Artışı</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-primary">appointments</td>
                            <td>patient_id, appointment_date</td>
                            <td>WHERE / JOIN</td>
                            <td><span class="badge bg-success-subtle text-success">+%45 Hızlandı</span></td>
                            <td><span class="badge bg-success">Optimize Edildi</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">medical_records</td>
                            <td>patient_id, doctor_id</td>
                            <td>FOREIGN KEY / JOIN</td>
                            <td><span class="badge bg-success-subtle text-success">+%60 Hızlandı</span></td>
                            <td><span class="badge bg-success">Optimize Edildi</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">invoices</td>
                            <td>patient_id, status</td>
                            <td>WHERE / GROUP BY</td>
                            <td><span class="badge bg-success-subtle text-success">+%35 Hızlandı</span></td>
                            <td><span class="badge bg-success">Optimize Edildi</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>