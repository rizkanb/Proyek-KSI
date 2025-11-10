<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <!-- Tambahkan CSS yang sama seperti di file dashboard_view.php Anda -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #2ecc71;
            --background-light: #f4f7f9;
            --background-dark: #ecf0f1;
            --card-bg: #ffffff;
            --text-color: #34495e;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-light);
            margin: 0;
            padding: 0;
            color: var(--text-color);
            min-height: 100vh;
        }
        .navbar-container {
            background-color: #555; /* Warna abu-abu gelap untuk navbar */
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-menu {
            display: flex;
            gap: 15px;
        }
        .navbar-menu a {
            background-color: #888; /* Warna abu-abu untuk tombol menu */
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .navbar-menu a:hover {
            background-color: #999;
        }
        .navbar-auth {
            display: flex;
            gap: 15px;
        }
        .navbar-auth a {
            background-color: #888;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .navbar-auth a:hover {
            background-color: #999;
        }
        .main-content {
            padding: 2rem;
            max-width: 1200px;
            margin: auto;
        }
        .logout-button {
            margin-top: 2rem;
            text-align: center;
        }
        .logout-button a {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .logout-button a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        <div class="navbar-menu">
            <a href="<?= base_url() ?>">HOME</a>
            <a href="<?= base_url('about') ?>">ABOUT</a>
            <a href="<?= base_url('produk') ?>">PRODUK</a>
            <a href="<?= base_url('benefit') ?>">BENEFIT</a>
            <a href="<?= base_url('kontak') ?>">KONTAK</a>
        </div>
        <div class="navbar-auth">
            <a href="<?= base_url('auth/login') ?>">SIGN IN</a>
            <a href="<?= base_url('auth/register') ?>">SIGN UP</a>
        </div>
    </div>

    <div class="main-content">
        <!-- Bagian ini akan diisi oleh konten dari file view lain (seperti data-anggota.html) -->
        <?= $this->renderSection('content') ?>
    </div>

    <div class="logout-button">
        <a href="<?= base_url('auth/logout') ?>">Logout</a>
    </div>

</body>
</html>
```
```php
<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('title') ?>
    <!-- Ganti dengan judul spesifik untuk setiap halaman -->
    Data Anggota | Koperasi Penjualan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Konten spesifik halaman Anda, seperti tabel data anggota -->
    <h2>Kelola Data Anggota</h2>
    <p>Ini adalah halaman untuk melihat, menambah, mengedit, dan menghapus data anggota.</p>
<?= $this->endSection() ?>
