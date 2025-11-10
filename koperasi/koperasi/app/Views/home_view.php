<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Mahasiswa - Pengembangan Kewirausahaan</title>
    <!-- Link Google Font: Poppins (Lebih Modern) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
        }
        /* Style Navbar Hitam */
        .navbar-custom {
            background-color: #343a40 !important; /* Warna gelap */
        }
        .navbar-custom .nav-link, .navbar-custom .navbar-brand {
            color: white !important;
            font-weight: 600; /* Dibuat lebih tebal */
        }
        .navbar-custom .btn-warning {
            color: #343a40;
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .navbar-custom .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        /* Hero Section dengan Background Image */
        .hero-section {
            background-image: url('https://via.placeholder.com/1600x600/343a40/ffffff?text=Background+Polinela'); /* Ganti dengan URL gambar kampus Anda */
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.9); /* Bayangan lebih kuat */
        }
        .hero-content {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.4); 
            border-radius: 10px;
        }

        /* Style Card Fitur */
        .feature-card {
            background-color: white;
            padding: 30px;
            border-radius: 12px; /* Dibuat lebih membulat */
            text-align: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Bayangan lebih terlihat */
            transition: transform 0.3s;
            min-height: 240px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .feature-card:hover {
            transform: translateY(-8px); /* Efek hover lebih kentara */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .icon-lg {
            width: 90px; 
            height: 90px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #eee;
        }
        
        /* Gaya Khusus untuk Kartu Benefit */
        .icon-ongkir { background-color: #e6f7ff; color: #007bff; border-color: #007bff; }
        .icon-diskon { background-color: #fff3e0; color: #ff9800; border-color: #ff9800; }
        .icon-komunitas { background-color: #e0ffe6; color: #28a745; border-color: #28a745; }


        /* Style Footer */
        footer {
            background-color: #343a40 !important;
            padding-top: 50px;
            padding-bottom: 50px;
            color: #ccc;
        }
        footer h5 {
            color: white;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .footer-logo-box {
            background-color: white;
            width: 100px;
            height: 100px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        
        /* Pinned Section ID Fix (untuk navigasi smooth) */
        section {
            padding-top: 80px; 
            margin-top: -80px; 
        }

    </style>
</head>
<body>

    <!-- NAVIGASI (Sesuai Gambar: Warna Gelap) -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/'); ?>">Koperasi Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- Navigasi dengan Anchor Links -->
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#benefit">Benefit</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
            </div>
            
            <div class="d-flex">
                <!-- Tombol Login -->
                <a href="<?= base_url('auth'); ?>" class="btn btn-warning me-2">Sign In</a>
                <!-- Tombol Daftar -->
                <a href="<?= base_url('auth/register_form'); ?>" class="btn btn-primary">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- 1. HOME SECTION (Sesuai Gambar: Background Gelap dengan Text Putih) -->
    <section id="home" class="hero-section">
        <div class="hero-content text-center">
            <h1 class="display-3 fw-bold">Selamat Datang di Koperasi Mahasiswa</h1>
            <p class="lead mt-3">Mendukung kewirausahaan mahasiswa dengan produk inovatif</p>
        </div>
    </section>

    <div class="container mt-5">
        
        <!-- 2. ABOUT SECTION (Tentang Kami) -->
        <section id="about" class="mb-5">
            <h2 class="text-center fw-bold mb-4">Tentang Kami</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <p class="lead">Koperasi Mahasiswa (Kopma) adalah wadah pengembangan kewirausahaan mahasiswa. Kami menyediakan berbagai produk usaha hasil karya mahasiswa untuk mendukung kreativitas dan kemandirian ekonomi.</p>
                </div>
            </div>
        </section>

        <!-- 3. PRODUK SECTION (Produk Unggulan) -->
        <section id="produk" class="mb-5">
            <h2 class="text-center fw-bold mb-5">Produk Unggulan</h2>
            <div class="row g-4 justify-content-center">
                
                <!-- Kartu Produk 1: Kuliner -->
                <div class="col-md-5">
                    <div class="feature-card">
                        <div class="icon-lg">
                            <!-- Icon Kuliner: Sendok & Garpu -->
                            <i class="fas fa-utensils fa-3x text-danger"></i> 
                        </div>
                        <h5 class="mt-2 fw-bold">Kuliner</h5>
                        <p class="text-muted">Makanan dan minuman buatan mahasiswa.</p>
                    </div>
                </div>

                <!-- Kartu Produk 2: Merchandise -->
                <div class="col-md-5">
                    <div class="feature-card">
                        <div class="icon-lg">
                            <!-- Icon Merchandise: Kaos -->
                            <i class="fas fa-tshirt fa-3x text-primary"></i> 
                        </div>
                        <h5 class="mt-2 fw-bold">Merchandise</h5>
                        <p class="text-muted">Kaos, totebag, dan produk kreatif.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- 4. BENEFIT SECTION (Benefit Bergabung) -->
        <section id="benefit" class="mb-5">
            <h2 class="text-center fw-bold mb-5">Benefit Bergabung dengan Kopma</h2>
            <div class="row g-4 justify-content-center">
                
                <!-- Kartu Benefit 1: Gratis Ongkir (Ikon Baru) -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-lg icon-ongkir">
                            <i class="fas fa-truck fa-3x"></i> 
                        </div>
                        <h5 class="mt-2 fw-bold">Gratis Ongkir</h5>
                        <p class="text-muted">Pengiriman gratis untuk wilayah kampus.</p>
                    </div>
                </div>

                <!-- Kartu Benefit 2: Diskon Pengguna Baru (Ikon Baru) -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-lg icon-diskon">
                            <i class="fas fa-tags fa-3x"></i> 
                        </div>
                        <h5 class="mt-2 fw-bold">Diskon Pengguna Baru</h5>
                        <p class="text-muted">Potongan harga khusus bagi anggota baru.</p>
                    </div>
                </div>

                <!-- Kartu Benefit 3: Dukungan Komunitas -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-lg icon-komunitas">
                            <i class="fas fa-handshake fa-3x"></i>
                        </div>
                        <h5 class="mt-2 fw-bold">Dukungan Komunitas</h5>
                        <p class="text-muted">Belajar bisnis bersama mahasiswa lainnya.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- 5. KONTAK SECTION (Pesan Pemicu) -->
        <section id="kontak" class="mb-5">
            <h2 class="text-center fw-bold mb-4">Kontak</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <p class="lead">Untuk informasi lebih lanjut, silakan hubungi kami melalui detail di bawah ini.</p>
                </div>
            </div>
        </section>

    </div>

    <!-- FOOTER (Sesuai Gambar: Warna Gelap & 3 Kolom) -->
    <footer class="text-white">
        <div class="container">
            <div class="row">
                
                <!-- Kolom 1: Koperasi Mahasiswa (About Footer) -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold">Koperasi Mahasiswa</h5>
                    <p>Kopma adalah wadah bagi mahasiswa untuk mengembangkan jiwa kewirausahaan dan mandiri secara finansial.</p>
                    <p>Kami berkomitmen untuk menyediakan produk berkualitas dan dukungan komunitas.</p>
                </div>

                <!-- Kolom 2: Hubungi Kami -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold">Hubungi Kami</h5>
                    <p>Email: <a href="mailto:kopma@example.com" class="text-warning text-decoration-none">kopma@example.com</a></p>
                    <p>Telp: 0812-3456-7890</p>
                    <p>Jam Kerja: Senin - Jumat, 09:00 - 17:00</p>
                </div>

                <!-- Kolom 3: Lokasi Kami (Ganti dengan Placeholder Logo Kampus) -->
                <div class="col-md-4">
                    <h5 class="fw-bold">Lokasi Kami</h5>
                    <div class="footer-logo-box">
                        <img src="https://via.placeholder.com/80x80?text=LOGO+KAMPUS" alt="Logo Kampus" class="img-fluid" style="border-radius: 50%;">
                    </div>
                    <p class="mb-0">Jalan Soekarno Hatta No.10, Rajabasa Raya, Kec. Rajabasa, Persimpangan GSG/Gedung Sakura Polinela, Kota Bandar Lampung, Lampung 35144</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4 pt-3 border-top border-secondary">
            <p class="mb-0">&copy; 2025 Koperasi Mahasiswa. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
