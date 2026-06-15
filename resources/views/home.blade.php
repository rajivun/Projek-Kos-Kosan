<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Akses Akun - BeautifulKost</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: #e0e0e0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 420px;
      background: #f8faff;
      padding: 40px 30px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      box-shadow: 0 0 50px rgba(0,0,0,0.1);
      text-align: center;
    }

    @media (min-width: 430px) {
      .container {
        min-height: 100vh;
        border-radius: 16px;
      }
    }

    .logo-brand {
      font-size: 28px;
      font-weight: 800;
      margin-bottom: 25px;
      letter-spacing: -1px;
      color: #0047bb;
    }
    .logo-brand span {
      font-weight: 300;
      color: #666;
    }

    /* PENGALIH TAB MASUK / DAFTAR */
    .tab-container {
      display: flex;
      background: #edf2f7;
      padding: 5px;
      border-radius: 12px;
      margin-bottom: 25px;
    }
    .tab-btn {
      flex: 1;
      padding: 10px;
      border: none;
      background: transparent;
      font-weight: 700;
      font-size: 14px;
      color: #718096;
      cursor: pointer;
      border-radius: 9px;
      transition: 0.2s;
    }
    .tab-btn.active {
      background: white;
      color: #0047bb;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    h2 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 8px;
      color: #1a1a1a;
    }
    .subtitle {
      color: #777;
      font-size: 13px;
      margin-bottom: 25px;
      line-height: 1.5;
    }

    /* Form Input */
    .form-panel {
      display: none;
    }
    .form-panel.active {
      display: block;
    }

    input {
      width: 100%;
      padding: 14px;
      border-radius: 12px;
      border: 1px solid #ddd;
      margin-bottom: 15px;
      font-size: 14px;
      background: white;
      outline: none;
      text-align: left;
    }
    input:focus {
      border-color: #0047bb;
      box-shadow: 0 0 0 4px rgba(0,71,187,0.05);
    }

    .btn-primary {
      width: 100%;
      padding: 14px;
      background: #0047bb;
      color: #fff;
      border: none;
      border-radius: 12px;
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0, 71, 187, 0.15);
    }
    .btn-primary:hover { background: #003794; }

    .divider {
      display: flex;
      align-items: center;
      margin: 20px 0;
      color: #999;
      font-size: 12px;
    }
    .divider::before, .divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background: #e2e8f0;
    }
    .divider span { margin: 0 15px; }

    /* Tombol Cari Kamar */
    .btn-check-kamar {
      width: 100%;
      padding: 14px;
      background: transparent;
      color: #0047bb;
      border: 2px solid #0047bb;
      border-radius: 12px;
      font-weight: 700;
      font-size: 14px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .btn-check-kamar:hover { background: #eff6ff; }

    .footer-text {
      font-size: 11px;
      color: #aaa;
      margin-top: 25px;
      line-height: 1.6;
    }
    .footer-text a { color: #0047bb; text-decoration: none; font-weight: 600; }
  </style>
</head>
<body>

  <div class="container">
    <div class="logo-brand">
      Beautiful<span>Kost</span>
    </div>

    <div class="tab-container">
      <button class="tab-btn active" onclick="switchTab('masuk')">Sudah Sewa (Masuk)</button>
      <button class="tab-btn" onclick="switchTab('daftar')">Penghuni Baru (Daftar)</button>
    </div>

    <div id="panel-masuk" class="form-panel active">
      <h2>Selamat Datang Kembali</h2>
      <p class="subtitle">Masuk untuk mengelola kamar, cek tagihan, atau melakukan perpanjangan sewa.</p>
      
      <input id="email-masuk" type="email" placeholder="Masukkan email terdaftar" />
      <button class="btn-primary" onclick="prosesMasuk()">Masuk Aplikasi ➡️</button>
    </div>

    <div id="panel-daftar" class="form-panel">
      <h2>Mulai Sewa Kamar</h2>
      <p class="subtitle">Buat akun baru untuk mulai mengajukan pemesanan kamar kos pertama Anda.</p>
      
      <input id="nama-daftar" type="text" placeholder="Nama Lengkap Anda" />
      <input id="email-daftar" type="email" placeholder="email@domain.com" />
      <input id="password-daftar" type="password" placeholder="Buat Password Anda" />
      <button class="btn-primary" onclick="prosesDaftar()">Daftar Akun Baru ✨</button>

      <div class="divider"><span>Atau cari kos dahulu</span></div>
      
      <a href="kamarsedia.html" style="text-decoration: none; width: 100%;">
        <button class="btn-check-kamar">🔍 Cek Ketersediaan Kamar Kos</button>
      </a>
    </div>

    <div class="footer-text">
      Dengan melanjutkan, Anda menyetujui <br>
      <a href="#">Ketentuan Layanan</a> dan <a href="#">Kebijakan Privasi</a> kami
    </div>
  </div>

<script>

function switchTab(type) {

  document.querySelectorAll('.tab-btn')
  .forEach(btn => btn.classList.remove('active'));

  document.querySelectorAll('.form-panel')
  .forEach(panel => panel.classList.remove('active'));

  if(type === 'masuk') {

    document.querySelectorAll('.tab-btn')[0]
    .classList.add('active');

    document.getElementById('panel-masuk')
    .classList.add('active');

  } else {

    document.querySelectorAll('.tab-btn')[1]
    .classList.add('active');

    document.getElementById('panel-daftar')
    .classList.add('active');

  }

}

async function prosesDaftar() {

  const nama =
  document.getElementById("nama-daftar").value.trim();

  const email =
  document.getElementById("email-daftar").value.trim();

  // MENGAMBIL VALUE PASSWORD DARI INPUT BARU
  const password =
  document.getElementById("password-daftar").value.trim();

  if(nama === "" || email === "" || password === "") {

    alert("Isi nama, email, dan password!");
    return;

  }

  try {

    const response = await fetch(
  "https://projek-kos-kosan-production.up.railway.app/api/register",
  {

        method: "POST",

        headers: {
          "Content-Type": "application/json"
        },

        body: JSON.stringify({

          name: nama,
          email: email,
          password: password // SEKARANG MENGIRIMKAN PASSWORD YANG DIINPUT USER

        })

      }
    );

    const data = await response.json();

    console.log(data);

    if(response.ok) {

      alert("🎉 Registrasi berhasil!");

      localStorage.setItem(
        "namaPengguna",
        nama
      );

      window.location.href =
      "kamarsedia.html";

    } else {

      alert(data.message);

    }

  } catch(error) {

    console.log(error);

    alert("Server error");

  }

}

async function prosesMasuk() {

  const email =
  document.getElementById("email-masuk").value.trim();

  if(email === "") {

    alert("Masukkan email!");
    return;

  }

  try {

    const response = await fetch(
  "https://projek-kos-kosan-production.up.railway.app/api/login",
  {

        method: "POST",

        headers: {
          "Content-Type": "application/json"
        },

        body: JSON.stringify({

          email: email,
          password: password

        })

      }
    );

    const data = await response.json();

    console.log(data);

    if(response.ok) {

      alert("Login berhasil!");

      localStorage.setItem(
        "namaPengguna",
        data.user.name
      );

      window.location.href =
      "dashboard.html";

    } else {

      alert(data.message);

    }

  } catch(error) {

    console.log(error);

    alert("Login gagal");

  }

}

</script>
</body>
</html>
