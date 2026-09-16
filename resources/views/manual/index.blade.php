<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kullanım Kılavuzu ve Yardım Merkezi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">Kullanıcı Dokümantasyonu ve Kullanım Kılavuzu</h3>
            <p class="text-muted small m-0">Klinik personelinin sistemi rahat kullanabilmesi için hazırlanan rehber</p>
        </div>
        <button class="btn btn-outline-secondary btn-sm shadow-sm">
            <i class="bi bi-file-earmark-pdf me-1"></i> PDF Kılavuz İndir
        </button>
    </div>

    <!-- Kılavuz Kartları -->
    <div class="row g-3">
        @foreach($guides as $guide)
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-start">
                    <div class="bg-primary bg-opacity-10 text-primary rounded p-3 me-3 fs-3">
                        <i class="bi {{ $guide['icon'] }}"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">{{ $guide['section'] }}</h6>
                        <p class="text-muted small mb-0">{{ $guide['desc'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>