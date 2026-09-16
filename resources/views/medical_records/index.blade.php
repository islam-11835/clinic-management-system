<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasta Tıbbi Geçmişi ve Tanı Kayıtları</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Hasta Tıbbi Geçmişi ve Tanı Kayıtları</h3>
                <p class="text-muted small mb-0">Hastaların geçmiş muayene, tanı, teşhis ve tedavi detaylarının takibi</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRecordModal">
                <i class="bi bi-file-earmark-plus me-1"></i> Yeni Tıbbi Kayıt Ekle
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Stat Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-primary-subtle text-primary p-3 rounded me-3">
                            <i class="bi bi-journal-medical fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Toplam Tıbbi Kayıt</span>
                            <h4 class="fw-bold mb-0">128</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-success-subtle text-success p-3 rounded me-3">
                            <i class="bi bi-check2-circle fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Tamamlanan Tedaviler</span>
                            <h4 class="fw-bold mb-0">94</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-warning-subtle text-warning p-3 rounded me-3">
                            <i class="bi bi-clock-history fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Devam Eden Tedaviler</span>
                            <h4 class="fw-bold mb-0">34</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-info-subtle text-info p-3 rounded me-3">
                            <i class="bi bi-hospital fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Aktif Takip Edilen Hasta</span>
                            <h4 class="fw-bold mb-0">42</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Geçmiş Muayene ve Tanı Kayıtları Listesi</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Hasta Adı Soyadı</th>
                            <th>Sorumlu Doktor</th>
                            <th>Tanı / Teşhis</th>
                            <th>Uygulanan Tedavi</th>
                            <th>Muayene Tarihi</th>
                            <th class="text-end">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Ahmet Yılmaz</td>
                            <td>Prof. Dr. Ahmet Yılmaz</td>
                            <td><span class="badge bg-danger-subtle text-danger">Hipertansiyon</span></td>
                            <td>Düzenli ilaç tedavisi ve diyet önerildi.</td>
                            <td>04/08/2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Ayşe Demir</td>
                            <td>Doç. Dr. Ayşe Kaya</td>
                            <td><span class="badge bg-warning-subtle text-warning">Tip 2 Diyabet</span></td>
                            <td>İnsülin dozu ayarlandı, kontrol randevusu verildi.</td>
                            <td>05/08/2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Mehmet Öztürk</td>
                            <td>Op. Dr. Mehmet Demir</td>
                            <td><span class="badge bg-info-subtle text-info">Miyopi</span></td>
                            <td>Göz numarası güncellendi, reçete yazıldı.</td>
                            <td>06/08/2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="addRecordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('medical_records.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Yeni Tıbbi Kayıt Ekle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold">Hasta Adı Soyadı</label>
                            <input type="text" name="patient_name" class="form-control" placeholder="Örn: Ahmet Yılmaz" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Sorumlu Doktor</label>
                            <input type="text" name="doctor_name" class="form-control" placeholder="Örn: Prof. Dr. Ahmet Yılmaz" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Tanı / Teşhis</label>
                            <input type="text" name="diagnosis" class="form-control" placeholder="Örn: Hipertansiyon" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Uygulanan Tedavi</label>
                            <textarea name="treatment" class="form-control" rows="3" placeholder="Tedavi detaylarını giriniz..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>