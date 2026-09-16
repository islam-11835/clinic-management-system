<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Test Kategorileri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm">
        <h3 class="mb-4">Test Kategorisi Ekle (Day 16)</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('test-categories.store') }}" method="POST" class="row g-3 mb-4">
            @csrf
            <div class="col-md-5">
                <input type="text" name="name" class="form-control" placeholder="Kategori Adı (Örn: Biyokimya)" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="department" class="form-control" placeholder="Departman (Örn: Laboratuvar)" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Kaydet</button>
            </div>
        </form>
    </div>
</body>
</html>