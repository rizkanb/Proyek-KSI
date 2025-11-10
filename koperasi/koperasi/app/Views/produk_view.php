<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk Koperasi</title>
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

        /* Styling Sidebar (Sama dengan Dashboard) */
        .sidebar {
            width: 280px;
            background-color: #2c3e50;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 4rem;
        }
        .sidebar-link {
            transition: background-color 0.2s ease, color 0.2s ease;
            color: #bdc3c7;
        }
        .sidebar-link:hover {
            background-color: #34495e;
            color: white;
        }
        .sidebar-link.active {
            background-color: #1abc9c; /* Hijau / Biru aktif */
            color: white;
            font-weight: bold;
        }

        /* Styling Main Content Area */
        .main-content {
            margin-left: 280px;
            padding-top: 1rem;
            min-height: 100vh;
        }
        
        /* Custom styles untuk Tabel */
        .table-header {
            background-color: #3498db; /* Biru terang */
            color: white;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR (MENU) -->
    <div class="sidebar flex flex-col justify-between">
        <div class="px-4">
            <!-- Jam Real-time -->
            <div id="current-time" class="bg-blue-500 text-white text-lg font-bold p-3 rounded-lg mb-6 text-center shadow-lg">
                <!-- Waktu akan diisi oleh JavaScript -->
            </div>
            
            <h3 class="text-white text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-bars mr-3"></i> Menu
            </h3>

            <!-- Link Navigasi Utama (Diaktifkan pada 'Produk') -->
            <nav class="space-y-2">
                <a href="<?= base_url('dashboard'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i> Dashboard
                </a>
                
                <!-- Produk (ACTIVE) -->
                <a href="<?= base_url('dashboard/produk'); ?>" class="sidebar-link active flex items-center p-3 rounded-lg">
                    <i class="fas fa-box-open w-5 mr-3"></i> Produk
                </a>

                <a href="<?= base_url('dashboard/pelanggan'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-users w-5 mr-3"></i> Pelanggan
                </a>
                
                <a href="<?= base_url('dashboard/pemesanan'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-shopping-cart w-5 mr-3"></i> Pemesanan
                </a>

                <a href="<?= base_url('dashboard/laporan'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-chart-line w-5 mr-3"></i> Laporan
                </a>
                
                <a href="<?= base_url('dashboard/setting'); ?>" class="sidebar-link flex items-center p-3 rounded-lg">
                    <i class="fas fa-cog w-5 mr-3"></i> Setting
                </a>
            </nav>
        </div>

        <!-- Logout Button -->
        <div class="p-4 border-t border-gray-700">
             <?php
                // Data dummy, asumsikan sudah dilewatkan dari Controller
                $username = $user['username'] ?? 'Admin Koperasi';
            ?>
            <p class="text-sm font-semibold text-gray-400 mb-2 truncate">Login sebagai: <?= esc($username); ?></p>
            <a href="<?= base_url('auth/logout'); ?>" class="btn-logout block w-full bg-red-600 text-white py-2 rounded-md font-bold text-base hover:bg-red-700 text-center">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="main-content p-8">
        
        <!-- Header Konten Halaman -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Data Produk</h1>
            <span class="text-sm font-medium text-green-600">Verifikasi Diri Anda</span>
        </div>

        <!-- Panel Kontrol (Filter dan Tombol Tambah) -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 md:space-x-4">
                
                <!-- Filter Jurusan/Prodi -->
                <div class="w-full md:w-1/3">
                    <label for="filter-prodi" class="block text-sm font-medium text-gray-700 mb-1">Filter Jurusan/Prodi:</label>
                    <select id="filter-prodi" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 p-2">
                        <option value="">-- Tampilkan Semua Jurusan --</option>
                        <option value="peternakan">Prodi Peternakan</option>
                        <option value="ekonomi">Ekonomi dan Bisnis</option>
                        <option value="budidaya">Budidaya Tanaman Pangan</option>
                        <option value="teknologi">Teknologi Informasi</option>
                    </select>
                </div>

                <!-- Kolom Pencarian -->
                <div class="w-full md:w-1/3">
                    <label for="search-produk" class="block text-sm font-medium text-gray-700 mb-1">Cari Produk:</label>
                    <div class="relative">
                        <input type="text" id="search-produk" placeholder="Cari berdasarkan Nama Produk..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-10 p-2">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                
                <!-- Tombol Tambah Produk -->
                <div class="w-full md:w-auto mt-6 md:mt-0">
                    <button class="w-full bg-green-500 text-white py-2 px-4 rounded-md font-semibold hover:bg-green-600 shadow-md">
                        <i class="fas fa-plus mr-2"></i> Tambah Produk Baru
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabel Data Produk -->
        <div class="bg-white p-6 rounded-xl shadow-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="table-header">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider rounded-tl-xl">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Nama Produk
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Jurusan/Prodi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Harga
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                            Stok
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider rounded-tr-xl">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="product-list">
                    <!-- Area untuk data produk. Silakan isi dengan data Anda menggunakan perulangan PHP (misalnya foreach) di sini. -->
                    <!-- Contoh baris data:
                    <tr data-prodi="peternakan">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Daging Sapi Segar</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Prodi Peternakan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp 120.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">50 Kg</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                            <button class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="text-red-600 hover:text-red-900" title="Hapus"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>

    </div>

    <script>
        // Fungsi untuk mengupdate jam real-time (diambil dari dashboard_view)
        function updateTime() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            
            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            
            const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;
            
            document.getElementById('current-time').textContent = timeString;
        }

        // Fungsi untuk filter dan search data produk
        function filterProducts() {
            const searchInput = document.getElementById('search-produk').value.toLowerCase();
            const filterProdi = document.getElementById('filter-prodi').value;
            const productList = document.getElementById('product-list').getElementsByTagName('tr');

            for (let i = 0; i < productList.length; i++) {
                const row = productList[i];
                // Cek data di kolom Nama Produk (index 1)
                const productName = row.cells[1].textContent.toLowerCase();
                // Ambil data-prodi dari attribute tr
                const productProdi = row.getAttribute('data-prodi');
                
                const matchesSearch = productName.includes(searchInput);
                const matchesProdi = filterProdi === '' || productProdi === filterProdi;

                // Tampilkan jika cocok dengan pencarian dan filter prodi
                if (matchesSearch && matchesProdi) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
        
        // Event Listeners
        document.getElementById('search-produk').addEventListener('keyup', filterProducts);
        document.getElementById('filter-prodi').addEventListener('change', filterProducts);
        
        // Inisialisasi
        setInterval(updateTime, 1000);
        updateTime();
        filterProducts(); // Tampilkan semua saat pertama kali dimuat
    </script>
</body>
</html>
