@extends('layouts.admin')

@section('title', 'Manajemen Meja - Yammien 12K')

@push('styles')
<style>
    body {
        overflow: hidden;
    }

    .main-content {
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .header-section h2 {
        font-size: 28px;
        color: #222;
        margin-bottom: 5px;
    }

    .header-section p {
        color: #999;
        font-size: 14px;
    }

    .menu-actions {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: nonpe;
        font-size: 14px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        gap: 5px;
    }

    .btn.add {
        background-color: #ff6633;
        color: #fff;
    }

    .btn.add:hover {
        background-color: #e45522;
    }

    .btn-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #000;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
    }

    .toggle-empty {
        background-color: #6c757d;
        color: #fff;
    }

    .toggle-empty:hover {
        background-color: #5a6268;
    }

    .toggle-filled {
        background-color: #28a745;
        color: #fff;
    }

    .toggle-filled:hover {
        background-color: #218838;
    }

    .table-list {
        flex: 1;
        overflow-y: auto;
        padding-right: 10px;
    }

    .table-list::-webkit-scrollbar {
        width: 6px;
    }

    .table-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .table-list::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }

    .table-list::-webkit-scrollbar-thumb:hover {
        background: #999;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 20px;
    }

    .card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .table-number {
        font-size: 24px;
        font-weight: bold;
        color: #222;
        margin-bottom: 10px;
    }

    .capacity {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }

    .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .status.empty {
        background-color: #d4edda;
        color: #155724;
    }

    .status.filled {
        background-color: #f8d7da;
        color: #721c24;
    }

    .card-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .action-row {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .card-actions form {
        display: inline;
    }

    @media (max-width: 768px) {
        .header-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .cards {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }
    }
</style>
@endpush

@section('content')
<section class="header-section">
    <div>
        <h2>Manajemen Meja</h2>
        <p>Kelola data meja dan status ketersediaan</p>
    </div>
    <div class="menu-actions">
        <a href="{{ route('tables.create') }}" class="btn add">
            <i class="fa-solid fa-plus"></i> Tambah Meja
        </a>
    </div>
</section>

<section class="table-list">
    <div class="cards">
        @forelse ($tables as $table)
            <div class="card">
                <p class="table-number">
                    <i class="fa-solid fa-table"></i> Meja {{ $table->table_number }}
                </p>
                <p class="capacity">
                    <i class="fa-solid fa-users"></i> Kapasitas: {{ $table->capacity }} orang
                </p>

                @if ($table->activeBooking)
                    <span class="status filled">
                        <i class="fa-solid fa-circle-xmark"></i> Filled (Terisi)
                    </span>
                @else
                    <span class="status empty">
                        <i class="fa-solid fa-circle-check"></i> Empty (Kosong)
                    </span>
                @endif

                <div class="card-actions">
                    <form action="{{ route('bookings.toggleStatus', $table->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @if ($table->activeBooking)
                            <button type="submit" class="btn toggle-empty" style="width: 100%;">
                                <i class="fa-solid fa-arrow-right-arrow-left"></i> Tandai Kosong
                            </button>
                        @else
                            <button type="submit" class="btn toggle-filled" style="width: 100%;">
                                <i class="fa-solid fa-arrow-right-arrow-left"></i> Tandai Terisi
                            </button>
                        @endif
                    </form>

                    <div class="action-row">
                        <a href="{{ route('tables.show', $table->id) }}" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen"></i> Edit
                        </a>
                        <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus meja ini?')">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                <i class="fa-solid fa-inbox" style="font-size: 64px; color: #ddd; margin-bottom: 20px; display: block;"></i>
                <p style="color: #999; font-size: 16px;">Belum ada data meja.</p>
                <p style="color: #ccc; font-size: 14px; margin-top: 10px;">Klik tombol "Tambah Meja" untuk menambahkan meja baru.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
