<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura ve Ödeme İşlemleri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Fatura ve Ödeme Yönetimi</h3>
                <p class="text-muted small mb-0">Hasta faturalarının takibi, ödeme durumları ve finansal kayıtlar</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInvoiceModal">
                <i class="bi bi-receipt me-1"></i> Yeni Fatura Oluştur
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
                            <i class="bi bi-currency-dollar fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Toplam Ciro</span>
                            <h4 class="fw-bold mb-0">₺48,250</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-success-subtle text-success p-3 rounded me-3">
                            <i class="bi bi-cash-stack fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Tahsil Edilen</span>
                            <h4 class="fw-bold mb-0">₺39,100</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-warning-subtle text-warning p-3 rounded me-3">
                            <i class="bi bi-hourglass-split fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Bekleyen Ödemeler</span>
                            <h4 class="fw-bold mb-0">₺9,150</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-info-subtle text-info p-3 rounded me-3">
                            <i class="bi bi-file-earmark-check fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small">Toplam Fatura</span>
                            <h4 class="fw-bold mb-0">64</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Fatura ve Ödeme Kayıtları Listesi</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Fatura No</th>
                            <th>Hasta Adı Soyadı</th>
                            <th>Tutar</th>
                            <th>Ödeme Durumu</th>
                            <th>Fatura Tarihi</th>
                            <th class="text-end">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-primary">#FTR-2026-001</td>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Ahmet Yılmaz</td>
                            <td class="fw-bold">₺1,250.00</td>
                            <td><span class="badge bg-success-subtle text-success">Ödendi</span></td>
                            <td>05/08/2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-printer"></i> Yazdır</button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">#FTR-2026-002</td>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Ayşe Demir</td>
                            <td class="fw-bold">₺3,400.00</td>
                            <td><span class="badge bg-warning-subtle text-warning">Bekliyor</span></td>
                            <td>06/08/2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-printer"></i> Yazdır</button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">#FTR-2026-003</td>
                            <td class="fw-semibold"><i class="bi bi-person-circle text-secondary me-2"></i>Mehmet Öztürk</td>
                            <td class="fw-bold">₺850.00</td>
                            <td><span class="badge bg-success-subtle text-success">Ödendi</span></td>
                            <td>07/08/2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-printer"></i> Yazdır</button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="addInvoiceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Yeni Fatura Oluştur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold">Hasta Adı Soyadı</label>
                            <input type="text" name="patient_name" class="form-control" placeholder="Örn: Ahmet Yılmaz" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Toplam Tutar (₺)</label>
                            <input type="number" step="0.01" name="amount" class="form-control" placeholder="Örn: 1250.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Ödeme Durumu</label>
                            <select name="status" class="form-select" required>
                                <option value="Ödendi">Ödendi</option>
                                <option value="Bekliyor">Bekliyor</option>
                                <option value="İptal Edildi">İptal Edildi</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Fatura Tarihi</label>
                            <input type="date" name="invoice_date" class="form-control" value="2026-08-07" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Fatura Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>