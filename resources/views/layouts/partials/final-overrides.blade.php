<style>
    /* Final UI consistency layer: loaded after page content so older inline styles cannot drift. */
    body > .container {
        display: flex !important;
        align-items: stretch !important;
        min-height: 100vh !important;
        background: transparent !important;
    }

    .main-content {
        min-width: 0 !important;
        flex: 1 1 auto !important;
        margin: 14px 14px 14px 0 !important;
        padding: clamp(18px, 2vw, 28px) !important;
        border-radius: 8px !important;
        overflow: auto !important;
    }

    .sidebar {
        width: 260px !important;
        min-width: 260px !important;
        height: 100vh !important;
        position: sticky !important;
        top: 0 !important;
        flex: 0 0 260px !important;
        align-items: stretch !important;
        padding: 18px 14px !important;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.08), transparent 34%), #111827 !important;
        border-right: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 0 !important;
        box-shadow: 18px 0 40px rgba(17, 24, 39, 0.14) !important;
    }

    body.sidebar-collapsed .sidebar {
        width: 88px !important;
        min-width: 88px !important;
        flex-basis: 88px !important;
        padding-left: 12px !important;
        padding-right: 12px !important;
    }

    .main-content h1,
    .main-content h2,
    .main-content .header-section h2,
    .main-content .page-header h2,
    .main-content .am-header h1,
    .main-content .kasir-menu-title h2,
    .main-content .checkout-header h2,
    .main-content .header h2,
    .main-content > section > h2 {
        margin: 0 !important;
        color: var(--ink) !important;
        font-size: clamp(22px, 1.9vw, 28px) !important;
        line-height: 1.18 !important;
        font-weight: 800 !important;
        letter-spacing: 0 !important;
    }

    .main-content h3,
    .main-content .menu-list h3,
    .main-content .order-section h3,
    .main-content .ringkasan h3,
    body > .container > .order-section h3 {
        margin: 0 0 14px !important;
        color: var(--ink) !important;
        font-size: clamp(18px, 1.5vw, 22px) !important;
        line-height: 1.25 !important;
        font-weight: 800 !important;
        letter-spacing: 0 !important;
    }

    .main-content p,
    .main-content label,
    .main-content input,
    .main-content select,
    .main-content button,
    .main-content a,
    .main-content td,
    .main-content th {
        letter-spacing: 0 !important;
    }

    .main-content .header-section,
    .main-content .page-header,
    .main-content .kasir-menu-head,
    .main-content .checkout-header {
        display: flex !important;
        flex-wrap: wrap !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 14px !important;
        padding: 0 0 18px !important;
        margin: 0 0 18px !important;
        border-bottom: 1px solid var(--line) !important;
    }

    .main-content .kasir-menu-head {
        display: grid !important;
        grid-template-columns: 1fr !important;
        align-items: stretch !important;
    }

    .main-content .kasir-menu-title p,
    .main-content .header-section p,
    .main-content .page-header p {
        margin-top: 8px !important;
        color: var(--muted) !important;
        font-size: 13px !important;
        line-height: 1.5 !important;
        font-weight: 600 !important;
    }

    .main-content .btn,
    .main-content button,
    .main-content .btn-search,
    .main-content .export-btn,
    .main-content .btn-add-cart,
    .main-content .btn-pay,
    .main-content .am-btn-add,
    .main-content .am-btn-search {
        font-size: 13px !important;
        font-weight: 700 !important;
    }

    .menu-nav a,
    .logout-btn {
        font-size: 14px !important;
        font-weight: 700 !important;
    }

    .brand-name {
        font-size: 18px !important;
        font-weight: 800 !important;
    }

    @media (max-width: 980px) {
        body > .container {
            flex-direction: column !important;
            min-height: 100vh !important;
            height: auto !important;
        }

        .main-content {
            width: auto !important;
            margin: 12px !important;
        }

        .order-section {
            width: auto !important;
            margin: 0 12px 12px !important;
        }
    }

    @media (max-width: 768px) {
        .sidebar,
        body.sidebar-collapsed .sidebar {
            width: 280px !important;
            min-width: 280px !important;
            flex-basis: auto !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            transform: translateX(-100%) !important;
            z-index: 1070 !important;
        }

        .sidebar.active {
            transform: translateX(0) !important;
        }

        .main-content h1,
        .main-content h2,
        .main-content .header-section h2,
        .main-content .page-header h2,
        .main-content .am-header h1,
        .main-content .kasir-menu-title h2,
        .main-content .checkout-header h2,
        .main-content .header h2 {
            font-size: 22px !important;
        }
    }
</style>
