@extends('layouts.admin')

@section('title', 'Aktivitas Log - Admin MeTime')

@push('styles')
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f2f2f2;
            color: #333;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #000;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
        }

        .profile {
            text-align: center;
            margin-bottom: 40px;
        }

        .avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #777;
            margin: 0 auto 10px;
        }

        .role {
            font-size: 12px;
            color: #aaa;
        }

        .name {
            font-size: 14px;
            color: #00c6ff;
        }

        .menu-nav {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            padding: 0 30px;
        }

        .menu-nav a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
            padding: 8px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .menu-nav a:hover,
        .menu-nav a.active {
            background-color: #ff6633;
            color: #fff;
        }

        .main-content {
            flex: 1;
            background: #fff;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 40px;
            overflow-y: auto;
        }

        .main-content h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        .search-input:focus {
            border-color: #ff6633;
            box-shadow: 0 0 4px rgba(255, 102, 51, 0.3);
        }

        .btn-search {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            background-color: #ff6633;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-search:hover {
            opacity: 0.85;
        }

        .export-bar {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 15px;
        }

        .export-btn {
            padding: 8px 14px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .export-btn.pdf {
            background-color: #ef4444;
            color: white;
        }

        .export-btn.excel {
            background-color: #22c55e;
            color: white;
        }

        .export-btn:hover {
            opacity: 0.85;
        }

        .activity-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .activity-table th {
            background: #ff6633;
            color: #fff;
            padding: 12px;
            font-size: 14px;
            text-align: left;
        }

        .activity-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .activity-table tr:nth-child(even) {
            background-color: #fafafa;
        }

        .activity-table tr:hover {
            background-color: #fff3ee;
        }

        .status {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
        }

        .status.success {
            background: #22c55e;
        }

        .status.info {
            background: #3b82f6;
        }

        .status.warning {
            background: #f59e0b;
        }

        .status.danger {
            background: #ef4444;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .pagination .active {
            background-color: #ff6633;
            color: white;
            border-color: #ff6633;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
        }

        @media (max-width: 768px) {
            .activity-table th,
            .activity-table td {
                font-size: 13px;
            }

            .main-content {
                padding: 20px;
            }

            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px 0;
            }
        }
</style>
@endpush

@section('content')
<h2>Log Aktivitas {{ Auth::user()->role == 'admin' ? 'Admin' : 'User' }}</h2>

            <div class="export-bar">
                <a href="{{ route('activity-logs.export-pdf', ['date' => request('date')]) }}" class="export-btn pdf">📄 Ekspor PDF</a>
                <a href="{{ route('activity-logs.export-excel', ['date' => request('date')]) }}" class="export-btn excel">📊 Ekspor Excel</a>
            </div>

            <form action="{{ route('activity-logs.index') }}" method="GET" class="search-bar">
                <label for="search-activity">Cari tanggal:</label>
                <input type="date" id="search-activity" name="date" class="search-input" value="{{ request('date') }}" />
                <button type="submit" class="btn-search">Cari</button>
                @if(request('date'))
                    <a href="{{ route('activity-logs.index') }}" class="btn-search" style="background-color: #6b7280;">Reset</a>
                @endif
            </form>

            <section class="activity-log">
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>User</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($activityLogs as $index => $log)
                            <tr>
                                <td>{{ ($activityLogs->currentPage() - 1) * $activityLogs->perPage() + $index + 1 }}</td>
                                <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $log->user->fullname ?? $log->user->name ?? 'Unknown' }}</td>
                                <td>{{ $log->description }}</td>
                                <td>
                                    @if($log->activity_type == 'login')
                                        <span class="status success">Berhasil</span>
                                    @elseif($log->activity_type == 'logout')
                                        <span class="status danger">Logout</span>
                                    @elseif($log->activity_type == 'make order')
                                        <span class="status info">Pesanan</span>
                                    @elseif($log->activity_type == 'check payment')
                                        <span class="status warning">Pembayaran</span>
                                    @elseif ($log->activity_type == 'update')
                                        <span class="status info">Diperbarui</span>
                                    @elseif(str_contains($log->description, 'Menghapus') || str_contains($log->description, 'hapus'))
                                        <span class="status warning">Dihapus</span>
                                    @elseif(str_contains($log->description, 'Menambahkan') || str_contains($log->description, 'tambah'))
                                        <span class="status info">Ditambahkan</span>
                                    @elseif(str_contains($log->description, 'Mengupdate') || str_contains($log->description, 'Edit'))
                                        <span class="status info">Diperbarui</span>
                                    @else
                                        <span class="status info">Info</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 40px; color: #999;">
                                    Belum ada log aktivitas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($activityLogs->hasPages())
                    <div class="pagination">
                        @if ($activityLogs->onFirstPage())
                            <span>&laquo;</span>
                        @else
                            <a href="{{ $activityLogs->previousPageUrl() }}&date={{ request('date') }}">&laquo;</a>
                        @endif

                        @foreach ($activityLogs->getUrlRange(1, $activityLogs->lastPage()) as $page => $url)
                            @if ($page == $activityLogs->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}&date={{ request('date') }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($activityLogs->hasMorePages())
                            <a href="{{ $activityLogs->nextPageUrl() }}&date={{ request('date') }}">&raquo;</a>
                        @else
                            <span>&raquo;</span>
                        @endif
                    </div>
                @endif
            </section>
@endsection
