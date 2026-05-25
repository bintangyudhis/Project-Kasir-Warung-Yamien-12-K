@extends('layouts.admin')
@section('title', 'Detail Meja - MeTime')

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

        .detail-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .detail-header h2 {
            font-size: 26px;
            font-weight: 700;
            color: #222;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn.back {
            background-color: #ccc;
            color: #333;
        }

        .btn.edit {
            background-color: #3b82f6;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .table-detail {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }

        .detail-value {
            font-size: 14px;
            color: #222;
            text-align: right;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
        }

        .status-badge.empty {
            background-color: #dcfce7;
            color: #15803d;
        }

        .status-badge.filled {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        .status-badge.maintenance {
            background-color: #fef3c7;
            color: #92400e;
        }

        .table-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-around;
            }

            .main-content {
                padding: 20px;
            }

            .detail-row {
                flex-direction: column;
                gap: 5px;
            }

            .detail-value {
                text-align: left;
            }
        }
    </style>
@endpush

@section('content')
            <div class="detail-container">
                <div class="detail-header">
                    <h2>Detail Meja</h2>
                    <a href="{{ route('tables.index') }}" class="btn back">Kembali</a>
                </div>

                <div class="table-detail">
                    <div class="detail-row">
                        <span class="detail-label">Nomor Meja</span>
                        <span class="detail-value"><strong>{{ $table->table_number }}</strong></span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Kapasitas</span>
                        <span class="detail-value">{{ $table->capacity }} orang</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Status</span>
                        <span class="detail-value">
                            @if ($table->status == 'empty')
                                <span class="status-badge empty">Empty (Kosong)</span>
                            @elseif ($table->status == 'filled')
                                <span class="status-badge filled">Filled (Terisi)</span>
                            @else
                                <span class="status-badge maintenance">{{ $table->status }}</span>
                            @endif
                        </span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Dibuat Pada</span>
                        <span class="detail-value">{{ $table->created_at->format('d M Y, H:i') }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Diupdate Pada</span>
                        <span class="detail-value">{{ $table->updated_at->format('d M Y, H:i') }}</span>
                    </div>

                    <div class="table-actions">
                        @if (auth()->user()->role == 'admin')
                            <a href="{{ route('tables.edit', $table->id) }}" class="btn edit">Edit Meja</a>    
                        @endif
                    </div>
                </div>
            </div>
        @endsection
