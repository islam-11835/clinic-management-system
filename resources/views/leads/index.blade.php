<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lead Tracking - CMS+</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Lead Tracking & CRM Module</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Source</th>
                <th>Service</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->full_name }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->source }}</td>
                <td>{{ $lead->service_interested }}</td>
                <td><span class="badge bg-primary">{{ $lead->status }}</span></td>
                <td>
                    <form action="{{ route('leads.updateStatus', $lead->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="New" {{ $lead->status == 'New' ? 'selected' : '' }}>New</option>
                            <option value="Contacted" {{ $lead->status == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="Converted" {{ $lead->status == 'Converted' ? 'selected' : '' }}>Converted</option>
                            <option value="Cancelled" {{ $lead->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>