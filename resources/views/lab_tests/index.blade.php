<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Laboratuvar Test Kayıtları - CMS+</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Laboratuvar Test Kayıtları ve Filtreleme Takibi</h2>
    
    <!-- Stats Cards -->
    <div class="row mt-4 mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Toplam Test</h5>
                    <p class="card-text fs-3">{{ $totalTests }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Tamamlanan</h5>
                    <p class="card-text fs-3">{{ $completedTests }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Bekleyen</h5>
                    <p class="card-text fs-3">{{ $pendingTests }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Search Form -->
    <form method="GET" action="/lab-tests" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Hasta veya Test Adı Ara..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">Tüm Durumlar</option>
                <option value="Tamamlandı" {{ request('status') == 'Tamamlandı' ? 'selected' : '' }}>Tamamlandı</option>
                <option value="Bekliyor" {{ request('status') == 'Bekliyor' ? 'selected' : '' }}>Bekliyor</option>
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
                <th>Test Adı</th>
                <th>Kategori</th>
                <th>Sonuç</th>
                <th>Durum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tests as $test)
            <tr>
                <td>{{ $test->patient_name }}</td>
                <td>{{ $test->test_name }}</td>
                <td>{{ $test->category }}</td>
                <td>{{ $test->result }}</td>
                <td>
                    <span class="badge {{ $test->status == 'Tamamlandı' ? 'bg-success' : 'bg-warning' }}">
                        {{ $test->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>