<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Website Pemesanan Makanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styleindex.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#home">Kantin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#about">About Kantin</a></li>
        <li class="nav-item"><a class="nav-link" href="#cafeteria">Cafeteria List</a></li>
        <li class="nav-item"><a class="nav-link" href="#howto">How to Buy</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Section: home Kantin -->
<section id="home">
  <div class="container">
    <div class="text-center">
      <h2>Selamat Datang Di Website Pemesanan Kantin</h2>
    </div>
  </div>
</section>

<!-- Section: About Kantin -->
<section id="about">
  <div class="container">
    <div class="content-box text-center">
      <h2>About Kantin</h2>
      
      <div style="position:relative; padding-bottom:50%; height:0; overflow:hidden; margin-bottom:20px;">
        <iframe src="https://www.youtube.com/embed/3AWQnv6g9sk"
          style="position:absolute; top:0; left:0; width:100%; height:100%;"
          frameborder="0" allowfullscreen>
        </iframe>
      </div>
      <p>
        Kantin SMK Telkom Jakarta merupakan tempat favorit siswa untuk menikmati makanan dengan harga yang murah serta mengenyangkan
      </p>
      <a href="pesan_menu.php" class="btn btn-success">Pesan di Kantin</a>
    </div>
  </div>
</section>

<!-- Section: Cafeteria List -->
<section id="cafeteria">
  <div class="container">
    <div class="content-box">
      <h2 class="text-center">Cafeteria List</h2>
        <h5>Menu dan Harga</h5>
        <ul>
            <li><b>Kantin Ibu Yuna</b></li>
            <li>Nasi Goreng - Rp15.000</li>
            <li>Es Teh - Rp5.000</li>
            <p></p>
            <li><b>Kantin Batagor Mas Riki</b></li>
            <li>Batagor - Rp12.000</li>
            <li>Siomay - Rp10.000 </li>
            <li>Bakso - Rp12.000</li>
            <p></p>
            <li><b>Kantin Masakan Rumah Bu Eka</b></li>
            <li>Batagor - Rp12.000</li>
            <li>Siomay - Rp10.000 </li>
            <li>Bakso - Rp12.000</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Section: How to Buy -->
<section id="howto">
  <div class="container">
    <div class="content-box">
      <h2 class="text-center">How to Buy</h2>
      <ol>
        <li>Pilih makanan/minuman yang ingin dipesan</li>
        <li>Sistem akan menghitung total harga secara otomatis</li>
        <li>QR Dummy akan ditampilkan sebagai simulasi pembayaran</li>
      </ol>
      <div class="text-center">
        <a href="pesan_menu.php" class="btn btn-primary">Pesan Sekarang</a>
      </div>
    </div>
  </div>
</section>

<!-- Section: Contact Us -->
<section id="contact">
  <div class="container">
    <div class="content-box">
      <h2 class="text-center">Contact Us</h2>
      <form class="row g-3">
        <div class="col-md-6">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control bg-dark text-white" id="nama" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control bg-dark text-white" id="email" required>
        </div>
        <div class="col-12">
          <label for="pesan" class="form-label">Pesan</label>
          <textarea class="form-control bg-dark text-white" id="pesan" rows="4" required></textarea>
        </div>
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-light">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- Footer -->
<footer>
  <p>&copy; 2025 Website Pemesanan Makanan</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
