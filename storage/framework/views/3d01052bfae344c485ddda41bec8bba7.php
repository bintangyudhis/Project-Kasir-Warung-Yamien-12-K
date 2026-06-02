<style>
    :root {
        --brand: #f05a28;
        --brand-dark: #c94317;
        --brand-soft: #fff0e8;
        --ink: #18212f;
        --muted: #687386;
        --line: #e7eaf0;
        --panel: #ffffff;
        --canvas: #f6f7fb;
        --success: #16a34a;
        --warning: #d97706;
        --danger: #dc2626;
        --info: #2563eb;
        --shadow-sm: 0 8px 24px rgba(24, 33, 47, 0.08);
        --shadow-md: 0 16px 42px rgba(24, 33, 47, 0.12);
        --radius: 8px;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        background:
            radial-gradient(circle at top left, rgba(240, 90, 40, 0.12), transparent 30rem),
            linear-gradient(135deg, #fffaf6 0%, var(--canvas) 45%, #eef4ff 100%) !important;
        color: var(--ink) !important;
        min-height: 100vh;
    }

    .container {
        min-height: 100vh;
        height: 100vh;
        background: transparent !important;
        gap: 0;
    }

    .main-content {
        margin: 14px 14px 14px 0;
        background: rgba(255, 255, 255, 0.88) !important;
        border: 1px solid rgba(255, 255, 255, 0.78);
        border-radius: 8px !important;
        box-shadow: var(--shadow-md);
        backdrop-filter: blur(14px);
        color: var(--ink);
    }

    h1, h2, h3 {
        color: var(--ink) !important;
        letter-spacing: 0;
    }

    .header-section,
    .page-header {
        padding: 4px 0 18px;
        border-bottom: 1px solid var(--line);
    }

    .header-section h2,
    .page-header h2,
    .kategori h2,
    .menu-list h3,
    .order-section h3,
    .main-content > h2 {
        font-size: clamp(22px, 2.4vw, 32px) !important;
        font-weight: 800 !important;
    }

    .header-section p,
    .category-id,
    .desc,
    .status,
    .capacity,
    .item-price {
        color: var(--muted) !important;
    }

    .btn,
    .btn-search,
    .export-btn,
    .btn-add-cart,
    .btn-pay,
    .login-btn,
    .am-btn-add,
    .am-btn-search {
        border-radius: var(--radius) !important;
        font-weight: 700 !important;
        box-shadow: 0 8px 18px rgba(240, 90, 40, 0.14);
        transition: transform 0.16s ease, box-shadow 0.16s ease, border-color 0.16s ease, background 0.16s ease;
    }

    .btn:hover,
    .btn-search:hover,
    .export-btn:hover,
    .btn-add-cart:hover,
    .btn-pay:hover,
    .login-btn:hover,
    .am-btn-add:hover,
    .am-btn-search:hover {
        transform: translateY(-1px);
        box-shadow: 0 12px 26px rgba(24, 33, 47, 0.14);
        opacity: 1 !important;
    }

    .btn.add,
    .btn-search,
    .btn-add-cart,
    .btn-pay,
    .am-btn-add,
    .am-btn-search,
    .kategori-buttons button.active {
        background: linear-gradient(135deg, var(--brand), #ff8a4c) !important;
        color: #fff !important;
        border: 0 !important;
    }

    .btn.edit,
    .btn-info,
    .btn-warning,
    .toggle-empty,
    .toggle-filled,
    .btn-outline,
    .kategori-buttons button,
    .am-page-btn {
        border: 1px solid var(--line) !important;
        background: #fff !important;
        color: var(--ink) !important;
        box-shadow: none !important;
    }

    .btn-danger,
    .btn.delete,
    .export-btn.pdf,
    .btn-remove {
        background: #dc2626 !important;
        color: #fff !important;
        border: 0 !important;
    }

    .export-btn.excel {
        background: #16a34a !important;
        color: #fff !important;
        border: 0 !important;
    }

    input,
    select,
    textarea,
    .search-input,
    .input-field,
    .am-input,
    .am-select {
        border: 1px solid var(--line) !important;
        background: #fff !important;
        color: var(--ink) !important;
        border-radius: var(--radius) !important;
        box-shadow: inset 0 1px 0 rgba(24, 33, 47, 0.02);
    }

    input:focus,
    select:focus,
    textarea:focus,
    .search-input:focus,
    .input-field:focus,
    .am-input:focus,
    .am-select:focus {
        outline: none !important;
        border-color: rgba(240, 90, 40, 0.65) !important;
        box-shadow: 0 0 0 4px rgba(240, 90, 40, 0.14) !important;
    }

    .cards {
        gap: 18px !important;
    }

    .card,
    .am-card,
    .am-add-card,
    .am-info-card,
    .am-main-card,
    .order-item,
    .total-box {
        background: var(--panel) !important;
        border: 1px solid var(--line) !important;
        border-radius: var(--radius) !important;
        box-shadow: var(--shadow-sm) !important;
    }

    .card {
        overflow: hidden;
    }

    .card:hover,
    .order-item:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 14px 28px rgba(24, 33, 47, 0.13) !important;
    }

    .img-placeholder {
        background: linear-gradient(135deg, #fff2ea, #edf5ff) !important;
        border: 1px solid #f1e4dc;
    }

    .price,
    .card .price,
    .am-uname,
    .name {
        color: var(--brand) !important;
    }

    .status.tersedia,
    .status.empty,
    .status.success,
    .am-badge-kasir {
        background: #ecfdf3 !important;
        color: #067647 !important;
        border: 1px solid #bbf7d0;
    }

    .status.tidak-tersedia,
    .status.filled,
    .status.danger {
        background: #fff1f2 !important;
        color: #be123c !important;
        border: 1px solid #fecdd3;
    }

    .status.info,
    .am-badge-admin {
        background: #eff6ff !important;
        color: #1d4ed8 !important;
        border: 1px solid #bfdbfe;
    }

    .status.warning {
        background: #fffbeb !important;
        color: #b45309 !important;
        border: 1px solid #fde68a;
    }

    table,
    .activity-table,
    .am-table {
        border-collapse: separate !important;
        border-spacing: 0 !important;
        overflow: hidden;
        border-radius: var(--radius) !important;
    }

    .activity-table,
    .am-table-wrap {
        border: 1px solid var(--line) !important;
        box-shadow: var(--shadow-sm) !important;
        background: #fff;
    }

    thead,
    .activity-table th,
    .am-table thead {
        background: #fff7f2 !important;
    }

    th,
    .activity-table th,
    .am-table th {
        color: #a83d13 !important;
        border-bottom: 1px solid #ffd8c7 !important;
    }

    td,
    .activity-table td,
    .am-table td {
        border-bottom: 1px solid var(--line) !important;
    }

    .alert {
        border: 1px solid transparent !important;
        border-radius: var(--radius) !important;
        box-shadow: var(--shadow-sm);
    }

    .alert-success {
        background: #ecfdf3 !important;
        color: #067647 !important;
        border-color: #bbf7d0 !important;
    }

    .alert-error {
        background: #fff1f2 !important;
        color: #be123c !important;
        border-color: #fecdd3 !important;
    }

    .alert-warning {
        background: #fffbeb !important;
        color: #b45309 !important;
        border-color: #fde68a !important;
    }

    .alert-info {
        background: #eff6ff !important;
        color: #1d4ed8 !important;
        border-color: #bfdbfe !important;
    }

    .order-section {
        margin: 14px 14px 14px 0;
        background: rgba(255, 255, 255, 0.92) !important;
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: var(--radius) !important;
        box-shadow: var(--shadow-md);
    }

    .main-content * {
        max-width: 100%;
    }

    .table-list,
    .menu-list,
    .category-list,
    .activity-log,
    .am-table-wrap,
    .orders-table-wrap {
        min-width: 0;
    }

    .card-actions,
    .action-row,
    .menu-actions,
    .export-bar,
    .search-bar,
    .am-toolbar,
    .btn-group-row {
        flex-wrap: wrap;
    }

    .btn,
    button,
    .export-btn,
    .btn-search,
    .btn-add-cart,
    .btn-pay {
        min-height: 38px;
        white-space: normal;
        text-align: center;
    }

    @media (max-width: 1180px) {
        .container {
            height: auto !important;
            min-height: 100vh;
        }

        .main-content {
            padding: 24px !important;
        }

        .cards {
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr)) !important;
        }

        .order-section {
            width: 340px !important;
            padding: 22px !important;
        }
    }

    @media (max-width: 980px) {
        .main-content {
            margin: 12px !important;
        }

        .order-section {
            width: auto !important;
            margin: 0 12px 12px !important;
        }

        .pesanan-container,
        .checkout-shell,
        .am-grid {
            grid-template-columns: 1fr !important;
            flex-direction: column !important;
        }

        .header-section,
        .page-header {
            gap: 14px;
        }
    }

    @media (max-width: 768px) {
        body {
            padding-top: 68px !important;
        }

        .container {
            height: auto !important;
            min-height: 100vh;
        }

        .main-content,
        .order-section {
            margin: 10px !important;
            padding: 18px !important;
            width: auto !important;
        }

        .header-section,
        .page-header,
        .search-bar,
        .export-bar,
        .menu-actions {
            align-items: stretch !important;
        }

        .header-section,
        .page-header {
            flex-direction: column !important;
        }

        .cards {
            grid-template-columns: repeat(auto-fill, minmax(155px, 1fr)) !important;
            gap: 12px !important;
        }

        .card,
        .am-card,
        .am-add-card,
        .am-info-card,
        .am-main-card {
            padding: 16px !important;
        }

        .menu-actions,
        .export-bar,
        .search-bar,
        .am-toolbar,
        .btn-group-row,
        .card-actions,
        .action-row {
            width: 100%;
        }

        .menu-actions > *,
        .export-bar > *,
        .search-bar > *,
        .btn-group-row > *,
        .card-actions > *,
        .action-row > * {
            min-width: 0;
        }

        .activity-table,
        .am-table,
        .orders-table {
            min-width: 680px;
        }
    }

    @media (max-width: 520px) {
        .main-content,
        .order-section {
            margin: 8px !important;
            padding: 14px !important;
        }

        .cards {
            grid-template-columns: 1fr !important;
        }

        .card-actions,
        .action-row,
        .menu-actions,
        .export-bar,
        .search-bar,
        .am-toolbar {
            flex-direction: column !important;
        }

        .btn,
        .btn-search,
        .export-btn,
        .btn-add-cart,
        .btn-pay,
        .login-btn,
        .am-btn-add,
        .am-btn-search {
            width: 100%;
        }

        .qty-control,
        .jumlah {
            width: 100% !important;
        }
    }
</style>
<?php /**PATH D:\Project-Kasir-Warung-Yamien-12-K\resources\views/layouts/partials/modern-styles.blade.php ENDPATH**/ ?>