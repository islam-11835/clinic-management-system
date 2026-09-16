<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Reçete Yönetimi - CMS+</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">CMS+ Klinik Sistemi</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Ana Sayfa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/randevular">Randevular</a></li>
                    <li class="nav-item"><a class="nav-link" href="/lab-testleri">Lab Testleri</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/receteler">Reçeteler</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tıbbi-gecmis">Tıbbi Geçmiş</a></li>
                    <li class="nav-item"><a class="nav-link" href="/faturalar">Faturalar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Reçete Kayıtları ve Detaylı Takip</h2>
        
        <div class="row mt-4 mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Toplam Reçete</h5>
                        <p class="card-text fs-3">{{ $totalPrescriptions }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Aktif</h5>
                        <p class="card-text fs-3">{{ $activePrescriptions }}</p>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Reçete No</th>
                    <th>Hasta Adı</th>
                    <th>Doktor Adı</th>
                    <th>İlaçlar ve Dozaj</th>
                    <th>Tarih</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prescriptions as $prescription)
                <tr>
                    <td>#REC-{{ $prescription->id }}</td>
                    <td>{{ $prescription->hasta_adi }}</td>
                    <td>{{ $prescription->doktor_adi }}</td>
                    <td>{{ $prescription->ilaclar }}</td>
                    <td>{{ $prescription->created_at ? $prescription->created_at->format('Y-m-d') : date('Y-m-d') }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary" onclick="window.print()">Yazdır</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>