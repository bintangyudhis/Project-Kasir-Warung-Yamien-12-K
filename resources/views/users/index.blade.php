@extends('layouts.admin')
@section('title', 'Manajemen Akun')

@section('content')

<style>
    /* ── Reset & Scrollbar ── */
    *, *::before, *::after {
        box-sizing: border-box;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    *::-webkit-scrollbar { display: none; width: 0; height: 0; }

    /* ── Tokens ── */
    :root {
        --primary:       #ff6633;
        --primary-dark:  #c94e20;
        --primary-dim:   rgba(255,102,51,.12);
        --primary-light: #fff4ef;
        --text:          #1e293b;
        --text-muted:    #64748b;
        --surface:       #ffffff;
        --bg:            #faf8f6;
        --border:        rgba(0,0,0,.07);
        --border-accent: rgba(255,102,51,.22);
        --radius-lg:     18px;
        --radius-md:     12px;
        --radius-sm:     8px;
        --shadow-sm:     0 1px 4px rgba(0,0,0,.06);
        --shadow-md:     0 4px 16px rgba(0,0,0,.08);
        --font-head:     'Poppins', sans-serif;
        --font-body:     'Inter', sans-serif;
        --transition:    .18s ease;
    }

    /* ── Page Shell ── */
    .am-wrap {
        padding: 28px 36px;
        background: var(--bg);
        min-height: 100vh;
        font-family: var(--font-body);
        color: var(--text);
    }
    @media (max-width: 1024px) {
        .am-wrap { margin-left: 0 !important; width: 100% !important; padding: 20px; }
    }

    /* ── Page Header ── */
    .am-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
    }
    .am-header-icon {
        width: 46px; height: 46px;
        background: var(--surface);
        border: 1px solid var(--border-accent);
        border-radius: var(--radius-md);
        display: flex; align-items: center; justify-content: center;
        color: var(--primary);
        font-size: 1.2rem;
        box-shadow: var(--shadow-sm);
        flex-shrink: 0;
    }
    .am-header h1 {
        font-family: var(--font-head);
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text);
        margin: 0;
    }

    /* ── Grid ── */
    .am-grid {
        display: grid;
        grid-template-columns: 270px 1fr;
        gap: 22px;
        align-items: start;
    }
    @media (max-width: 900px) {
        .am-grid { grid-template-columns: 1fr; }
    }

    /* ── Card Base ── */
    .am-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 20px;
        box-shadow: var(--shadow-sm);
    }

    /* ── Sidebar ── */
    .am-sidebar { display: flex; flex-direction: column; gap: 16px; }

    /* Tambah Akun card */
    .am-add-card {
        background: var(--surface);
        border: 1px solid var(--border-accent);
        border-radius: var(--radius-lg);
        padding: 18px;
        box-shadow: var(--shadow-sm);
    }
    .am-card-label {
        display: flex; align-items: center; gap: 8px;
        font-size: .7rem; font-weight: 600; text-transform: uppercase;
        letter-spacing: .6px; color: var(--text-muted);
        margin-bottom: 12px;
    }
    .am-card-label i { font-size: .85rem; color: var(--primary); }

    .am-btn-add {
        display: flex; align-items: center; justify-content: center; gap: 8px;
        width: 100%; padding: 11px 16px;
        background: var(--primary);
        color: #fff;
        border: none; border-radius: var(--radius-md);
        font-family: var(--font-body);
        font-size: .88rem; font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 3px 10px rgba(255,102,51,.28);
    }
    .am-btn-add:hover {
        background: var(--primary-dark);
        box-shadow: 0 5px 14px rgba(255,102,51,.38);
        color: #fff;
        transform: translateY(-1px);
    }
    .am-btn-add:active { transform: translateY(0); }

    /* Stats box */
    .am-stats {
        background: var(--primary);
        border-radius: var(--radius-lg);
        padding: 22px 20px;
        display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 4px;
        box-shadow: 0 6px 20px rgba(255,102,51,.24);
        position: relative; overflow: hidden;
    }
    .am-stats::before {
        content: '';
        position: absolute; top: -30px; right: -30px;
        width: 100px; height: 100px;
        border-radius: 50%;
        background: rgba(255,255,255,.1);
    }
    .am-stats-num {
        font-family: var(--font-head);
        font-size: 2.6rem; font-weight: 700;
        color: #fff; line-height: 1; position: relative; z-index: 1;
    }
    .am-stats-lbl {
        font-size: .8rem; color: rgba(255,255,255,.88);
        font-weight: 500; position: relative; z-index: 1;
    }

    /* Info card */
    .am-info-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 18px;
        box-shadow: var(--shadow-sm);
    }
    .am-info-card p {
        font-size: .82rem; line-height: 1.7;
        color: var(--text-muted); margin: 0;
    }
    .am-info-card strong { color: var(--text); }

    /* ── Main Section ── */
    .am-main-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 22px;
        box-shadow: var(--shadow-sm);
    }

    /* Toolbar */
    .am-toolbar {
        display: flex; gap: 12px; margin-bottom: 18px; flex-wrap: wrap;
    }
    .am-search-wrap {
        flex: 2; min-width: 180px; position: relative;
    }
    .am-search-wrap i {
        position: absolute; left: 13px; top: 50%; transform: translateY(-50%);
        color: var(--primary); font-size: .9rem; pointer-events: none;
    }
    .am-input {
        width: 100%; padding: 10px 12px 10px 38px;
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        background: var(--bg);
        font-family: var(--font-body);
        font-size: .88rem; color: var(--text);
        transition: var(--transition);
    }
    .am-input:focus {
        outline: none;
        border-color: var(--primary);
        background: #fff;
        box-shadow: 0 0 0 3px var(--primary-dim);
    }
    .am-input::placeholder { color: #b0bec5; }

    .am-filter-wrap { flex: 0 0 auto; min-width: 140px; }
    .am-select {
        width: 100%; height: 100%;
        padding: 10px 14px;
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
        background: var(--bg);
        font-family: var(--font-body);
        font-size: .88rem; color: var(--text);
        cursor: pointer;
        transition: var(--transition);
    }
    .am-select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-dim);
    }

    .am-btn-search {
        padding: 10px 16px;
        background: var(--primary);
        color: #fff; border: none;
        border-radius: var(--radius-md);
        font-family: var(--font-body);
        font-size: .88rem; font-weight: 600;
        cursor: pointer; transition: var(--transition);
        white-space: nowrap;
    }
    .am-btn-search:hover { background: var(--primary-dark); }

    /* Table */
    .am-table-wrap {
        width: 100%; overflow-x: auto;
        border: 1px solid var(--border);
        border-radius: var(--radius-md);
    }
    .am-table {
        width: 100%; border-collapse: collapse;
        min-width: 640px; table-layout: fixed;
    }
    .am-table colgroup col:nth-child(1)  { width: 56px; }
    .am-table colgroup col:nth-child(2)  { width: 60px; }
    .am-table colgroup col:nth-child(3)  { width: 130px; }
    .am-table colgroup col:nth-child(4)  { width: auto; }
    .am-table colgroup col:nth-child(5)  { width: auto; }
    .am-table colgroup col:nth-child(6)  { width: 84px; }
    .am-table colgroup col:nth-child(7)  { width: 80px; }

    .am-table thead { background: var(--primary-light); }
    .am-table th {
        padding: 13px 14px;
        text-align: left;
        font-size: .7rem; font-weight: 600;
        text-transform: uppercase; letter-spacing: .5px;
        color: var(--primary-dark);
        border-bottom: 1px solid var(--border-accent);
        white-space: nowrap;
    }
    .am-table th.tc, .am-table td.tc { text-align: center; }
    .am-table th a {
        text-decoration: none; color: inherit;
        display: inline-flex; align-items: center; gap: 5px;
    }

    .am-table td {
        padding: 13px 14px;
        font-size: .88rem; color: var(--text);
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
        overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
    }
    .am-table tbody tr:last-child td { border-bottom: none; }
    .am-table tbody tr:hover td { background: #fffaf8; }

    /* Avatar */
    .am-avatar {
        width: 38px; height: 38px;
        border-radius: 50%;
        border: 1.5px solid var(--border-accent);
        object-fit: cover;
        display: block; margin: 0 auto;
    }
    .am-avatar-placeholder {
        width: 38px; height: 38px;
        border-radius: 50%;
        background: var(--primary-light);
        border: 1px solid var(--border-accent);
        display: flex; align-items: center; justify-content: center;
        color: var(--primary); font-size: 1rem;
        margin: 0 auto;
    }

    /* Username */
    .am-uname { font-weight: 600; color: var(--primary); }

    /* Badge */
    .am-badge {
        display: inline-block; padding: 3px 11px;
        border-radius: 20px; font-size: .72rem; font-weight: 600;
        letter-spacing: .3px;
    }
    .am-badge-kasir {
        background: var(--primary-light);
        color: var(--primary-dark);
        border: 1px solid var(--border-accent);
    }
    .am-badge-admin {
        background: #ede9fe; color: #5b21b6;
        border: 1px solid rgba(91,33,182,.18);
    }

    /* Action buttons */
    .am-actions { display: flex; gap: 7px; justify-content: center; }
    .am-btn-icon {
        width: 33px; height: 33px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--border);
        background: var(--surface);
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; font-size: .95rem; transition: var(--transition);
        text-decoration: none;
    }
    .am-btn-edit { color: #d97706; }
    .am-btn-edit:hover { background: #fffbeb; border-color: #d97706; transform: scale(1.07); }
    .am-btn-del  { color: #dc2626; }
    .am-btn-del:hover  { background: #fef2f2; border-color: #dc2626; transform: scale(1.07); }

    /* Empty state */
    .am-empty {
        text-align: center; padding: 56px 20px;
    }
    .am-empty i { font-size: 2.6rem; color: #cbd5e1; margin-bottom: 12px; display: block; }
    .am-empty p { color: var(--text-muted); margin: 0; font-size: .9rem; }

    /* Pagination */
    .am-pagination {
        display: flex; justify-content: space-between; align-items: center;
        margin-top: 18px; padding-top: 16px;
        border-top: 1px dashed var(--border-accent);
        flex-wrap: wrap; gap: 12px;
    }
    .am-page-info { font-size: .8rem; color: var(--text-muted); }
    .am-page-ctrl { display: flex; gap: 7px; }
    .am-page-btn {
        width: 33px; height: 33px;
        display: flex; align-items: center; justify-content: center;
        border-radius: var(--radius-sm);
        border: 1px solid var(--border);
        background: var(--surface);
        color: var(--text); text-decoration: none;
        font-size: .85rem; transition: var(--transition);
    }
    .am-page-btn:hover:not(.am-page-btn--disabled) {
        border-color: var(--primary); color: var(--primary);
    }
    .am-page-btn--disabled { opacity: .4; cursor: default; pointer-events: none; }
</style>

<div class="am-wrap">

    {{-- Page Header --}}
    <div class="am-header">
        <div class="am-header-icon">
            <i class="fas fa-users-cog"></i>
        </div>
        <h1>Manajemen Akun</h1>
    </div>

    {{-- Grid --}}
    <div class="am-grid">

        {{-- ── Sidebar ── --}}
        <aside class="am-sidebar">

            {{-- Tambah Akun --}}
            <div class="am-add-card">
                <div class="am-card-label">
                    <i class="fas fa-plus"></i> Buat Akun
                </div>
                <a href="{{ route('users.create') }}" class="am-btn-add">
                    <i class="fas fa-plus-circle"></i> Tambah Akun Baru
                </a>
            </div>

            {{-- Stats --}}
            <div class="am-stats">
                <div class="am-stats-num">{{ $users->total() }}</div>
                <div class="am-stats-lbl">Akun Terdaftar</div>
            </div>

            {{-- Info --}}
            <div class="am-info-card">
                <div class="am-card-label">
                    <i class="fas fa-info-circle"></i> Informasi
                </div>
                <p>
                    Gunakan halaman ini untuk mengelola akses pengguna sistem.
                    Pastikan peran diatur dengan benar antara <strong>Admin</strong>
                    dan <strong>Kasir</strong> untuk keamanan data.
                </p>
            </div>

        </aside>

        {{-- ── Main ── --}}
        <main>
            <div class="am-main-card">

                {{-- Toolbar / Filter --}}
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="am-toolbar">
                        <div class="am-search-wrap">
                            <i class="fas fa-search"></i>
                            <input
                                type="text"
                                name="search"
                                class="am-input"
                                placeholder="Cari nama atau username…"
                                value="{{ request('search') }}"
                            >
                        </div>
                        <div class="am-filter-wrap">
                            <select name="role" class="am-select" onchange="this.form.submit()">
                                <option value="">Semua Peran</option>
                                <option value="admin"   {{ request('role') == 'admin'   ? 'selected' : '' }}>Admin</option>
                                <option value="cashier" {{ request('role') == 'cashier' ? 'selected' : '' }}>Kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="am-btn-search">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>

                {{-- Table --}}
                <div class="am-table-wrap">
                    <table class="am-table">
                        <colgroup>
                            <col><col><col><col><col><col><col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => request('sort') == 'asc' ? 'desc' : 'asc']) }}">
                                        ID
                                        @if(request('sort') == 'asc')
                                            <i class="fas fa-caret-up"></i>
                                        @else
                                            <i class="fas fa-caret-down"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="tc">Foto</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th class="tc">Peran</th>
                                <th class="tc">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>#{{ $user->id }}</td>
                                    <td class="tc">
                                        @if ($user->photo)
                                            <img
                                                src="{{ asset('storage/' . $user->photo) }}"
                                                class="am-avatar"
                                                alt="Foto {{ $user->username }}"
                                            >
                                        @else
                                            <div class="am-avatar-placeholder">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="am-uname">{{ $user->username }}</span>
                                    </td>
                                    <td>{{ $user->fullname }}</td>
                                    <td title="{{ $user->email }}">{{ $user->email }}</td>
                                    <td class="tc">
                                        <span class="am-badge {{ $user->role === 'admin' ? 'am-badge-admin' : 'am-badge-kasir' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="tc">
                                        <div class="am-actions">
                                            <a
                                                href="{{ route('users.edit', $user->id) }}"
                                                class="am-btn-icon am-btn-edit"
                                                title="Edit {{ $user->username }}"
                                            >
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form
                                                action="{{ route('users.destroy', $user->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Hapus akun {{ $user->username }}?')"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="am-btn-icon am-btn-del"
                                                    title="Hapus {{ $user->username }}"
                                                >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="am-empty">
                                            <i class="fas fa-folder-open"></i>
                                            <p>Tidak ada data ditemukan</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="am-pagination">
                    <div class="am-page-info">
                        Data {{ $users->firstItem() ?? 0 }} – {{ $users->lastItem() ?? 0 }}
                        dari {{ $users->total() }}
                    </div>
                    <div class="am-page-ctrl">
                        @if ($users->onFirstPage())
                            <span class="am-page-btn am-page-btn--disabled">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $users->previousPageUrl() }}" class="am-page-btn">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}" class="am-page-btn">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="am-page-btn am-page-btn--disabled">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        @endif
                    </div>
                </div>

            </div>
        </main>

    </div>
</div>

@endsection