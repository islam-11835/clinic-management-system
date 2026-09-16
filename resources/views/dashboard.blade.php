<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ana Sayfa - CMS+ Klinik Yönetim Sistemi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">CMS+ Klinik Sistemi</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="/">Ana Sayfa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/randevular">Randevular</a></li>
                    <li class="nav-item"><a class="nav-link" href="/lab-testleri">Lab Testleri</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tıbbi-gecmis">Tıbbi Geçmiş</a></li>
                    <li class="nav-item"><a class="nav-link" href="/receteler">Reçeteler</a></li>
                    <li class="nav-item"><a class="nav-link" href="/faturalar">Faturalar</a></li>
                    <!-- ميزة الذكاء الاصطناعي في الـ Navbar -->
                    <li class="nav-item"><a class="nav-link text-warning fw-bold" href="/ai-assistant">Yapay Zekâ Asistanı</a></li>
                    <li class="nav-item"><a class="nav-link" href="/yedekleme-paneli">Yedekleme & Excel</a></li>
<li class="nav-item"><a class="nav-link" href="/security">Güvenlik</a></li>
<li class="nav-item"><a class="nav-link" href="/system-logs">Loglar</a></li>
<li class="nav-item"><a class="nav-link text-success fw-bold" href="/final-check">Final Check</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h2>Klinik Genel Bakış Paneli (Dashboard)</h2>
        <p class="text-muted">Tüm klinik operasyonlarının ve modüllerin genel özet bilgileri aşağıda yer almaktadır.</p>
        
        <div class="row mt-4">
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Toplam Randevu</h5>
                        <p class="card-text fs-3">{{ $totalAppointments }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Laboratuvar Testi</h5>
                        <p class="card-text fs-3">{{ $totalLabTests }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Muayene Kaydı</h5>
                        <p class="card-text fs-3">{{ $totalRecords }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Toplam Gelir (₺)</h5>
                        <p class="card-text fs-3">{{ number_format($totalRevenue, 2) }} ₺</p>
                    </div>
                </div>
            </div>
            <!-- كارت ميزة الذكاء الاصطناعي -->
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Yapay Zekâ Ön Teşhis</h5>
                        <p class="card-text fs-6">Semptom Analizi & Asistan</p>
                        <a href="/ai-assistant" class="btn btn-sm btn-outline-light">Asistana Git</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>