<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Aktivitas Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #ff6633;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-success { background-color: #28a745; color: white; }
        .badge-info { background-color: #17a2b8; color: white; }
        .badge-warning { background-color: #ffc107; color: #000; }
        .badge-danger { background-color: #dc3545; color: white; }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Laporan Aktivitas Log</h1>
    <div class="subtitle">
        @if(request('date'))
            Tanggal: {{ \Carbon\Carbon::parse(request('date'))->format('d F Y') }}
        @else
            Semua Data
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 15%">User</th>
                <th style="width: 15%">Tipe Aktivitas</th>
                <th style="width: 50%">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activityLogs as $index => $log)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $log->user->username }}</td>
                <td>
                    @php
                        $statusClass = 'badge-info';
                        if(str_contains(strtolower($log->activity_type), 'hapus') || str_contains(strtolower($log->activity_type), 'logout')) {
                            $statusClass = 'badge-danger';
                        } elseif(str_contains(strtolower($log->activity_type), 'tambah') || str_contains(strtolower($log->activity_type), 'login')) {
                            $statusClass = 'badge-success';
                        } elseif(str_contains(strtolower($log->activity_type), 'update')) {
                            $statusClass = 'badge-warning';
                        }
                    @endphp
                    <span class="badge {{ $statusClass }}">{{ $log->activity_type }}</span>
                </td>
                <td>{{ $log->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</p>
        <p>Total Data: {{ count($activityLogs) }} aktivitas</p>
    </div>
</body>
</html>
