<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Bildirimleri - CMS+</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/"><i class="bi bi-hospital me-2"></i>CMS+ Klinik Sistemi</a>
            <a href="/" class="btn btn-outline-light btn-sm"><i class="bi bi-arrow-left me-1"></i> Ana Sayfa</a>
        </div>
    </nav>

    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-bell-fill me-2 text-primary"></i>Klinik Sistem Bildirimleri</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @foreach($notifications as $notif)
                        <div class="list-group-item p-3 d-flex justify-content-between align-items-center {{ !$notif['read'] ? 'bg-light' : '' }}">
                            <div class="d-flex align-items-center">
                                <span class="badge {{ $notif['type'] == 'Randevu' ? 'bg-primary' : ($notif['type'] == 'Lab' ? 'bg-info' : 'bg-warning text-dark') }} p-2 me-3">
                                    <i class="bi bi-info-circle fs-6"></i>
                                </span>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $notif['title'] }}</h6>
                                    <p class="mb-0 text-muted small">{{ $notif['detail'] }}</p>
                                    <small class="text-secondary fs-8">{{ $notif['time'] }}</small>
                                </div>
                            </div>
                            <span class="badge {{ $notif['read'] ? 'bg-secondary' : 'bg-success' }}">
                                {{ $notif['read'] ? 'Okundu' : 'Yeni' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>