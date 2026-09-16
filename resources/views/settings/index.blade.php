<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Ayarları ve Profil Yönetimi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Sistem Genel Ayarları ve Profil Yönetimi</h3>
                <p class="text-muted small mb-0">Klinik bilgileri, kullanıcı Yetkileri ve sistem parametrelerinin yapılandırılması</p>
            </div>
            <button class="btn btn-primary" form="settingsForm" type="submit">
                <i class="bi bi-floppy me-1"></i> Değişiklikleri Kaydet
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Left Navigation Tabs / Info -->
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 bg-white mb-3">
                    <div class="text-center py-3">
                        <div class="badge bg-primary-subtle text-primary p-3 rounded-circle mb-3">
                            <i class="bi bi-hospital fs-1"></i>
                        </div>
                        <h6 class="fw-bold mb-1">Merkez Klinik Otomasyonu</h6>
                        <span class="badge bg-success-subtle text-success mb-2">Sistem Aktif</span>
                        <p class="text-muted small">Son Güncelleme: 10/08/2026</p>
                    </div>
                </div>

                <div class="list-group shadow-sm border-0">
                    <a href="#" class="list-group-item list-group-item-action active fw-semibold">
                        <i class="bi bi-sliders me-2"></i> Genel Genel Ayarlar
                    </a>
                    <a href="#" class="list-group-item list-group-item-action fw-semibold">
                        <i class="bi bi-shield-lock me-2"></i> Kullanıcı Yetkileri & Roller
                    </a>
                    <a href="#" class="list-group-item list-group-item-action fw-semibold">
                        <i class="bi bi-bell me-2"></i> Bildirim Tercihleri
                    </a>
                    <a href="#" class="list-group-item list-group-item-action fw-semibold">
                        <i class="bi bi-database-check me-2"></i> Yedekleme ve Güvenlik
                    </a>
                </div>
            </div>

            <!-- Right Content Form -->
            <div class="col-md-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="fw-bold mb-0">Klinik Bilgileri ve Sistem Parametreleri</h6>
                    </div>
                    <div class="card-body p-4">
                        <form id="settingsForm" action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Klinik / Hastane Adı</label>
                                    <input type="text" name="clinic_name" class="form-control" value="Nevşehir Özel Sağlık Kliniği" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Sistem İletişim E-Postası</label>
                                    <input type="email" name="email" class="form-control" value="info@nevsehirklinik.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Telefon Numarası</label>
                                    <input type="text" name="phone" class="form-control" value="+90 384 215 00 00" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Çalışma Saatleri</label>
                                    <input type="text" name="working_hours" class="form-control" value="Hafta İçi: 08:30 - 17:30" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Klinik Adresi</label>
                                    <textarea name="address" class="form-control" rows="2" required>Nevşehir Hacı Bektaş Veli Üniversitesi Kampüsü Yanı, Merkez / Nevşehir</textarea>
                                </div>

                                <hr class="my-4">

                                <h6 class="fw-bold mb-3">Güvenlik ve Otomasyon Tercihleri</h6>

                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="smsNotif" checked>
                                        <label class="form-check-label small fw-semibold" for="smsNotif">
                                            Otomatik SMS Randevu Hatırlatıcı
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="autoBackup" checked>
                                        <label class="form-check-label small fw-semibold" for="autoBackup">
                                            Günlük Otomatik Veritabanı Yedekleme
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>