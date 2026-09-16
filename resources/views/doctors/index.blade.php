<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doktor & Poliklinik Yönetimi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Doktor & Poliklinik Yönetimi</h3>
                <p class="text-muted small mb-0">Sistemdeki aktif doktorlar, uzmanlık alanları ve poliklinik durumları</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                <i class="bi bi-person-plus-fill me-1"></i> Yeni Doktor Ekle
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
                            <i class="bi bi-person-badge fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Toplam Doktor</span>
                            <h4 class="fw-bold mb-0">12</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-success-subtle text-success p-3 rounded me-3">
                            <i class="bi bi-hospital fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Aktif Poliklinikler</span>
                            <h4 class="fw-bold mb-0">8</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-warning-subtle text-warning p-3 rounded me-3">
                            <i class="bi bi-calendar-check fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Bugünkü Randevular</span>
                            <h4 class="fw-bold mb-0">45</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-info-subtle text-info p-3 rounded me-3">
                            <i class="bi bi-clock-history fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Nöbetçi Doktorlar</span>
                            <h4 class="fw-bold mb-0">3</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Doktor Listesi ve Poliklinik Atamaları</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Doktor Adı</th>
                            <th>Uzmanlık / Poliklinik</th>
                            <th>E-posta</th>
                            <th>Telefon</th>
                            <th>Durum</th>
                            <th class="text-end">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Prof. Dr. Ahmet Yılmaz</td>
                            <td><span class="badge bg-info-subtle text-info fw-semibold">Kardiyoloji</span></td>
                            <td>ahmet.yilmaz@klinik.com</td>
                            <td>+90 532 111 2233</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Doç. Dr. Ayşe Kaya</td>
                            <td><span class="badge bg-primary-subtle text-primary fw-semibold">Dahiliye</span></td>
                            <td>ayse.kaya@klinik.com</td>
                            <td>+90 535 444 5566</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Op. Dr. Mehmet Demir</td>
                            <td><span class="badge bg-warning-subtle text-warning fw-semibold">Göz Hastalıkları</span></td>
                            <td>mehmet.demir@klinik.com</td>
                            <td>+90 505 777 8899</td>
                            <td><span class="badge bg-secondary">İzinli</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('doctors.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Yeni Doktor Ekle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold">Doktor Adı Soyadı</label>
                            <input type="text" name="name" class="form-control" placeholder="Örn: Dr. Mehmet Öz" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Uzmanlık / Poliklinik</label>
                            <input type="text" name="specialty" class="form-control" placeholder="Örn: Nöroloji" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">E-posta</label>
                            <input type="email" name="email" class="form-control" placeholder="doktor@klinik.com" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Telefon</label>
                            <input type="text" name="phone" class="form-control" placeholder="05xx xxx xx xx" required>
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