<?php
// MENGAMBIL INFORMASI PENGGUNA DAN WAKTU
$admin_name = session()->get('nama_lengkap') ?? 'Administrator'; 

// MENDAPATKAN URL DAN SERVICE (Didefinisikan di sini, tetapi penggunaannya diubah di bawah)
$url = service('url'); 
$current_url = current_url(); 

// Tambahkan definisi variabel lain jika ada
$title = $title ?? 'Dashboard Admin Koperasi'; 
$content_title = $content_title ?? 'Dashboard';

// Mendefinisikan Base URL untuk perbandingan agar lebih bersih
$dashboard_base = base_url('dashboard');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f7f6; }
        .main-wrapper { display: flex; min-height: 100vh; }
        
        /* Sidebar */
        .sidebar { width: 250px; background-color: #343a40; color: white; padding: 20px 0; box-shadow: 2px 0 5px rgba(0,0,0,0.1); flex-shrink: 0; }
        .sidebar-header { text-align: center; margin-bottom: 30px; border-bottom: 1px solid #495057; padding-bottom: 15px; }
        .sidebar-header h4 { margin: 0; font-size: 1.2em; }
        .sidebar nav a { 
            display: flex; align-items: center; padding: 12px 20px; margin-bottom: 2px; color: #adb5bd; 
            text-decoration: none; transition: background-color 0.2s, color 0.2s; 
        }
        .sidebar nav a:hover { background-color: #495057; color: white; }
        .sidebar nav a.active { 
            background-color: #007bff; color: white; font-weight: bold; 
            border-left: 3px solid #ffc107; 
        }
        .sidebar nav i { margin-right: 10px; width: 20px; text-align: center; }

        /* Top Bar */
        .topbar { 
            background-color: white; padding: 10px 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            display: flex; justify-content: space-between; align-items: center; 
        }
        .topbar .greeting { font-weight: 600; color: #333; }
        .topbar .logout-btn { 
            background-color: #dc3545; color: white; border: none; padding: 8px 15px; 
            border-radius: 4px; text-decoration: none; font-weight: bold; 
            transition: background-color 0.2s;
        }
        .topbar .logout-btn:hover { background-color: #c82333; }

        /* Main Content */
        .content-area { flex-grow: 1; display: flex; flex-direction: column; }
        .main-content { padding: 30px; flex-grow: 1; }
        .content-header { margin-bottom: 25px; }
        .content-header h1 { margin: 0; color: #333; font-size: 1.8em; }
        
        /* Tambahan style dari view Produk/index */
        .jurusan-card { cursor: pointer; transition: transform .2s, box-shadow .2s; border-left: 5px solid transparent; }
        .jurusan-card:hover { transform: scale(1.03); box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; }
        .jurusan-card.active { border-left: 5px solid var(--bs-primary); box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1); }
        .jurusan-card.active .card-body { background-color: var(--bs-light) !important; }
        .jurusan-card .card-title { font-size: 1rem; margin-bottom: 0; font-weight: 600; }
        .header-controls { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
    </style>
</head>
<body>
    <div class="main-wrapper">
        
        <div class="sidebar">
            <div class="sidebar-header">
                <h4><i class="fas fa-chart-line text-primary"></i> ADMIN PANEL</h4>
            </div>
            <nav>
                <?php 
                // Menggunakan perbandingan string dengan base_url()
                // Cek apakah URL saat ini adalah /dashboard (URL terpendek)
                $is_dashboard_active = $current_url === $dashboard_base || $current_url === rtrim($dashboard_base, '/');
                ?>
                <a href="<?= route_to('dashboard') ?>" class="<?= $is_dashboard_active ? 'active' : '' ?>">
                    <i class="fas fa-th-large"></i> Dashboard Utama
                </a>
                
                <?php 
                // Menggunakan base_url() untuk perbandingan, menghilangkan $url->route()
                $is_produk_active = strpos($current_url, base_url('dashboard/produk')) !== false; 
                ?>
                <a href="<?= route_to('produk_management') ?>" class="<?= $is_produk_active ? 'active' : '' ?>">
                    <i class="fas fa-box"></i> Produk
                </a>

                <a href="<?= route_to('pelanggan') ?>" class="<?= strpos($current_url, base_url('dashboard/pelanggan')) !== false ? 'active' : '' ?>">
                    <i class="fas fa-users"></i> Pelanggan
                </a>

                <a href="<?= route_to('pemesanan_list') ?>" class="<?= strpos($current_url, base_url('dashboard/pemesanan')) !== false ? 'active' : '' ?>">
                    <i class="fas fa-shopping-basket"></i> Pemesanan
                </a>

                <a href="<?= route_to('anggota') ?>" class="<?= strpos($current_url, base_url('dashboard/anggota')) !== false ? 'active' : '' ?>">
                    <i class="fas fa-user-friends"></i> Anggota
                </a>

                <a href="<?= route_to('laporan') ?>" class="<?= strpos($current_url, base_url('dashboard/laporan')) !== false ? 'active' : '' ?>">
                    <i class="fas fa-file-alt"></i> Laporan
                </a>

                <a href="<?= route_to('setting') ?>" class="<?= strpos($current_url, base_url('dashboard/setting')) !== false ? 'active' : '' ?>">
                    <i class="fas fa-cog"></i> Pengaturan
                </a>
                
                <div style="padding: 20px; text-align: center; margin-top: 20px;">
                    <a href="<?= route_to('logout') ?>" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </nav>
        </div>

        <div class="content-area">
            <div class="topbar">
                <span class="greeting">Halo, Selamat Datang Kembali, **<?= esc($admin_name) ?>**</span>
                <span class="text-muted"><?= date('d M Y') ?></span>
            </div>
            
            <div class="main-content">
                <div class="content-header">
                    <h1 class="text-secondary"><?= esc($content_title) ?></h1>
                </div>

                <?= $this->renderSection('content') ?>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>