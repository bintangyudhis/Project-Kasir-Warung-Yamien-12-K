<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MeTime - Beranda</title>
  <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

.navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #f5f5f5;
  color: #000;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 32px;
  z-index: 10;
}

.nav-left {
  display: flex;
  align-items: center;
  gap: 12px;
}

.logo {
  width: 40px;
  height: auto;
}

.logo-text {
  font-weight: bold;
  color: #f97316;
  font-size: 18px;
}

.logout-btn {
  background-color: #f97316;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}

.logout-btn:hover {
  background-color: #ea580c;
}

.hero {
  height: 100vh;
  background: url("mie-bg.jpg") no-repeat center center / cover;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: left;
  color: #fff;
  position: relative;
  padding-top: 80px; /* biar gak ketutupan navbar */
}

.hero::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.hero-content {
  max-width: 600px;
  position: relative;
  z-index: 2;
}

.hero h1 {
  font-size: 42px;
  line-height: 1.2;
  font-weight: 700;
  margin-bottom: 16px; /* 🔧 di sini kamu tadi ada titik (.) di akhir, harus dihapus */
}

.hero p {
  font-size: 18px;
  color: #eee;
  margin-bottom: 24px;
}

.buttons {
  display: flex;
  gap: 12px;
}

.btn {
  background-color: #f97316;
  color: #fff;
  border: none;
  padding: 12px 24px;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}

.btn:hover {
  background-color: #ea580c;
}

  </style>
</head>
<body>
  <nav class="navbar">
    <div class="nav-left">
      <span class="logo-text">MeTime</span>
    </div>
    <button class="logout-btn">LOGOUT</button>
  </nav>

  <section class="hero">
    <div class="hero-content">
      <h1>Nikmati Kelezatan Mie Ayam Spesial</h1>
      <p>Rasakan Kenikmatannya Sekarang juga.</p>
      <div class="buttons">
        <button class="btn">DINE IN</button>
        <button class="btn">TAKE AWAY</button>
      </div>
    </div>
  </section>
</body>
</html>
