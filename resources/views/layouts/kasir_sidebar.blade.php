<button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>

<aside class="sidebar" id="sidebar">
  <div class="profile">
    <div class="avatar"></div>
    <p class="role">Kasir</p>
    <p class="name">{{ Auth::user()->username }}</p>
  </div>

  <nav class="menu-nav">
    <a href="{{ route('orders.index') }}">Menu</a>
    <a href="{{ route('orders.riwayat') }}">Riwayat</a>
  </nav>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>
<style>
  /* ===== SIDEBAR ===== */
.sidebar {
  width: 260px;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  background: #000;
  color: #fff;
  padding: 20px;
  z-index: 1000;
  transition: transform 0.3s ease;
}

/* ===== PROFILE ===== */
.profile {
  text-align: center;
  margin-bottom: 30px;
}

.avatar {
  width: 70px;
  height: 70px;
  background: #444;
  border-radius: 50%;
  margin: 0 auto 10px;
}

/* ===== NAV ===== */
.menu-nav a {
  display: block;
  padding: 12px;
  color: white;
  text-decoration: none;
  border-radius: 8px;
  margin-bottom: 8px;
}

.menu-nav a:hover {
  background: #ff6b2c;
}

/* ===== TOGGLE ===== */
.sidebar-toggle {
  display: none;
  position: fixed;
  top: 15px;
  left: 15px;
  z-index: 1100;
  background: #ff6b2c;
  color: white;
  border: none;
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 18px;
}

/* ===== OVERLAY ===== */
.sidebar-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.4);
  z-index: 900;
}

/* ===================== */
/* 📱 MOBILE MODE */
/* ===================== */
@media (max-width: 768px) {
  .sidebar {
    transform: translateX(-100%);
  }

  .sidebar.active {
    transform: translateX(0);
  }

  .sidebar-toggle {
    display: block;
  }

  .sidebar-overlay.active {
    display: block;
  }
}

</style>