<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Günlükleri ve İşlem İzleme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">Sistem Günlükleri (Log Management)</h3>
                <p class="text-muted small mb-0">Kullanıcı hareketleri ve sistem güvenlik kayıtlarının izlenmesi</p>
            </div>
            <span class="badge bg-primary px-3 py-2">Canlı İzleme Aktif</span>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-shield-check me-2"></i>Son İşlem Kayıtları</h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Kullanıcı / Aktör</th>
                            <th>Yapılan İşlem</th>
                            <th>IP Adresi</th>
                            <th>Tarih</th>
                            <th>Seviye</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr>
                            <td>{{ $log['id'] }}</td>
                            <td class="fw-bold">{{ $log['user'] }}</td>
                            <td>{{ $log['action'] }}</td>
                            <td><code>{{ $log['ip'] }}</code></td>
                            <td>{{ $log['date'] }}</td>
                            <td>
                                <span class="badge {{ $log['level'] == 'WARNING' ? 'bg-warning text-dark' : 'bg-info' }}">
                                    {{ $log['level'] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>