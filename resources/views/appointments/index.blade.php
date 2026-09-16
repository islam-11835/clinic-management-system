<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Randevu Yönetimi ve Filtreleme - CMS+</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Hasta Randevu ve Poliklinik Yönetimi</h2>
    
    <!-- Stats Cards -->
    <div class="row mt-4 mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Toplam Randevu</h5>
                    <p class="card-text fs-3">{{ $totalAppointments }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Onaylanan</h5>
                    <p class="card-text fs-3">{{ $confirmedAppointments }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Bekleyen</h5>
                    <p class="card-text fs-3">{{ $pendingAppointments }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Search Form -->
    <form method="GET" action="/randevular" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Hasta veya Doktor Adı Ara..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="durum" class="form-select">
                <option value="">Tüm Durumlar</option>
                <option value="Onaylandı" {{ request('durum') == 'Onaylandı' ? 'selected' : '' }}>Onaylandı</option>
                <option value="Bekliyor" {{ request('durum') == 'Bekliyor' ? 'selected' : '' }}>Bekliyor</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrele</button>
        </div>
    </form>

    <!-- Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Hasta Adı</th>
                <th>Doktor Adı</th>
                <th>Poliklinik</th>
                <th>Tarih & Saat</th>
                <th>Durum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->hasta_adi }}</td>
                <td>{{ $appointment->doktor_adi }}</td>
                <td>{{ $appointment->poliklinik }}</td>
                <td>{{ $appointment->randevu_tarihi }} - {{ $appointment->randevu_saati }}</td>
                <td>
                    <span class="badge {{ $appointment->durum == 'Onaylandı' ? 'bg-success' : 'bg-warning' }}">
                        {{ $appointment->durum }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>