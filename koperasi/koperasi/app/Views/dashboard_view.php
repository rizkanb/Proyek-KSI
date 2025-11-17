<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Koperasi Penjualan</title>
    <!-- Memuat Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Memuat Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Menggunakan font Inter */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f3f5;
        }

        /* Styling Sidebar */
        .sidebar {
            width: 280px; /* Lebar sidebar */
            background-color: #2c3e50; /* Warna gelap khas (Dark Slate) */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 4rem; /* Ruang untuk jam/logo di atas */
        }
        .sidebar-link {
            transition: background-color 0.2s ease, color 0.2s ease;
            color: #bdc3c7; /* Warna teks abu-abu terang */
        }
        .sidebar-link:hover {
            background-color: #34495e; /* Hover effect */
            color: white;
        }
        .sidebar-link.active {
            background-color: #1abc9c; /* Warna hijau/biru untuk aktif */
            color: white;
            font-weight: bold;
        }

        /* Styling Main Content Area */
        .main-content {
            margin-left: 280px; /* Sesuaikan dengan lebar sidebar */
            padding-top: 1rem;
            min-height: 100vh;
        }

        /* Dashboard specific styles */
        .card-shadow {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
        }
        .card-shadow:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 20px -3px rgba(0, 0, 0, 0.1), 0 6px 8px -4px rgba(0, 0, 0, 0.08);
        }
        .header-box {
            padding-top: 2rem;
            padding-bottom: 2rem;
            border-radius: 0.5rem;
        }
        .min-height-card {
            min-height: 200px;
        }
        /* Style untuk Tombol Logout di dalam Sidebar */
        .btn-logout {
            transition: background-color 0.2s;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR (MENU) -->
    <div class="sidebar flex flex-col justify-between">
        
        <!-- Header Menu & Jam -->
        <div class="px-4">
            <!-- Jam dan Tanggal (seperti di gambar Anda) -->
            <div id="current-time" class="bg-blue-500 text-white text-lg font-bold p-3 rounded-lg mb-6 text-center shadow-lg">
                <!-- Waktu akan diisi oleh JavaScript -->
            </div>
            
            <h3 class="text-white text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-bars mr-3"></i> Menu
            </h3>

            <!-- Link Navigasi Utama (diperbarui sesuai permintaan Anda: Produk, Pelanggan, Pemesanan, Laporan, Setting) -->
            <nav class="space-y-2">
                <!-- Dashboard (Active Link) -->
                <a href="<?= base_url('dashboard'); ?>" class="sidebar-link active flex items-center p-3 rounded-lg">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i> Dashboard
                </a>
                
                <!-- Produk -->
                <a href="<?= base_url('dashboard/produk'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-box-open w-5 mr-3"></i> Produk
                </a>

                <!-- Pelanggan -->
                <a href="<?= base_url('dashboard/pelanggan'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-users w-5 mr-3"></i> Pelanggan
                </a>
                
                <!-- Pemesanan (Transaksi) -->
                <a href="<?= base_url('dashboard/pemesanan'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-shopping-cart w-5 mr-3"></i> Pemesanan
                </a>

                <!-- Laporan -->
                <a href="<?= base_url('dashboard/laporan'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-chart-line w-5 mr-3"></i> Laporan
                </a>
                
                <!-- Setting -->
                <a href="<?= base_url('dashboard/setting'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-cog w-5 mr-3"></i> Setting
                </a>
            </nav>
        </div>

        <!-- Logout Button di bawah Sidebar -->
        <div class="p-4 border-t border-gray-700">
             <?php
                // Ambil data user dari session atau database
                $username = $user['username'] ?? 'User';
            ?>
            <p class="text-sm font-semibold text-gray-400 mb-2 truncate">Login sebagai: <?= esc($username); ?></p>
            <a href="<?= base_url('auth/logout'); ?>" class="btn-logout block w-full bg-red-600 text-white py-2 rounded-md font-bold text-base hover:bg-red-700 text-center">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="main-content p-8">
        
        <!-- Navbar Sederhana (Verifikasi Diri Anda, diposisikan di kanan atas) -->
        <div class="flex justify-end items-center h-10 mb-8">
            <span class="text-sm font-medium text-green-600">Verifikasi Diri Anda</span>
        </div>

        <!-- 2. HEADER DASHBOARD BIRU -->
        <?php
            $level = $user['level'] ?? 'anggota';
        ?>

        <div class="w-full max-w-full bg-blue-500 header-box mb-12 shadow-xl text-white text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold mb-1">Dashboard Koperasi Penjualan</h1>
            <p class="text-base sm:text-lg font-light">
                Selamat datang, <span class="font-semibold"><?= esc($username); ?></span> | Status: <span class="italic"><?= esc($level); ?></span>
            </p>
        </div>

        <!-- 3. CARD DASHBOARD (3 KOLOM) - Dipertahankan untuk tampilan utama Dashboard -->
        <div class="w-full max-w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Card 1: Produk -->
            <a href="<?= base_url('dashboard/produk'); ?>" class="card-shadow bg-white p-6 text-center flex flex-col items-center justify-center min-height-card">
                <div class="text-6xl text-purple-600 mb-4">
                    <i class="fas fa-box-open"></i> 
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-1">Total Produk</h2>
                <p class="text-sm text-gray-500 max-w-[80%] mx-auto">
                    Kelola data inventaris produk.
                </p>
            </a>

            <!-- Card 2: Pelanggan -->
            <a href="<?= base_url('dashboard/pelanggan'); ?>" class="card-shadow bg-white p-6 text-center flex flex-col items-center justify-center min-height-card">
                <div class="text-6xl text-green-600 mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-1">Total Pelanggan</h2>
                <p class="text-sm text-gray-500 max-w-[80%] mx-auto">
                    Data lengkap daftar pelanggan.
                </p>
            </a>

            <!-- Card 3: Pemesanan -->
            <a href="<?= base_url('dashboard/pemesanan'); ?>" class="card-shadow bg-white p-6 text-center flex flex-col items-center justify-center min-height-card">
                <div class="text-6xl text-yellow-600 mb-4">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-1">Pemesanan Hari Ini</h2>
                <p class="text-sm text-gray-500 max-w-[80%] mx-auto">
                    Lihat jumlah transaksi pemesanan hari ini.
                </p>
            </a>
            
        </div>
        <!-- Catatan: Untuk Pemesanan, Anda bisa mengubah Kartu Ketiga menjadi "Pemesanan Hari Ini" atau "Pemesanan Belum Diproses". -->

    </div>

    <script>
        // JavaScript untuk menampilkan waktu real-time di Sidebar (sesuai gambar)
        function updateTime() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            
            hours = hours % 12;
            hours = hours ? hours : 12; // Jam '0' menjadi '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            
            const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;
            
            document.getElementById('current-time').textContent = timeString;
        }

        // Update setiap detik
        setInterval(updateTime, 1000);
        updateTime(); // Panggil sekali saat dimuat untuk inisialisasi
    </script>
</body>
</html>
