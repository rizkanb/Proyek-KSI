<!-- 
Ini adalah file view yang dipanggil oleh method index() di User.php
Lokasi file: app/Views/user/dashboard.php
-->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Dashboard') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <!-- 
            CATATAN: 
            Pastikan Anda menggunakan nama array yang konsisten.
            Di controller (profile) Anda menggunakan $data['user'].
            Di sini Anda menggunakan $pelanggan. Saya akan sesuaikan controllernya.
        -->
        <h2 class="fw-bold text-dark"><i class="fas fa-user-circle me-2 text-primary"></i> Selamat Datang, <?= esc($pelanggan['nama_pelanggan'] ?? 'Pelanggan'); ?>!</h2>
        
        <a href="<?= route_to('logout'); ?>" class="btn btn-danger btn-sm shadow-sm">
            <i class="fas fa-sign-out-alt me-1"></i> Logout
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            Ringkasan Akun
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="mb-0 text-muted">Email:</p>
                    <h5 class="fw-bold"><?= esc($pelanggan['email'] ?? '-'); ?></h5>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="mb-0 text-muted">Telepon:</p>
                    <h5 class="fw-bold"><?= esc($pelanggan['telepon'] ?? '-'); ?></h5>
                </div>
                <div class="col-12">
                    <p class="mb-0 text-muted">Alamat:</p>
                    <h5 class="fw-bold"><?= esc($pelanggan['alamat'] ?? '-'); ?></h5>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="<?= route_to('user_profile'); ?>" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-edit me-1"></i> Edit Profil
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title text-success"><i class="fas fa-history me-2"></i> Riwayat Pemesanan</h5>
                    <p class="card-text">Lihat daftar transaksi dan pesanan Anda sebelumnya.</p>
                    <a href="<?= route_to('user_history'); ?>" class="btn btn-success">Cek Riwayat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
             <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title text-warning"><i class="fas fa-box me-2"></i> Status Pesanan</h5>
                    <p class="card-text">Lacak status pesanan Anda yang sedang diproses.</p>
                    <a href="<?= route_to('user_history'); ?>" class="btn btn-warning text-dark">Lacak Pesanan</a>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>