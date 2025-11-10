<!-- 
Lokasi file: app/Views/user/history.php
Dipanggil oleh: App\Controllers\UserDashboard::history()
Menggunakan data $pesanan (array) yang dikirim dari controller.
-->
<?= $this->extend('layouts/user_template') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <h2 class="fw-bold mb-4 text-success"><i class="fas fa-history me-2"></i> Riwayat & Status Pemesanan</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <?php if (empty($pesanan)): ?>
                <div class="alert alert-info text-center" role="alert">
                    <i class="fas fa-info-circle me-1"></i> Anda belum memiliki riwayat pemesanan.
                    <p class="mt-2 mb-0"><a href="<?= route_to('user_buy'); ?>" class="alert-link">Mulai Beli Produk Sekarang!</a></p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class="table-success">
                                <th>#</th>
                                <th>Produk</th>
                                <th>Tanggal Order</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pesanan as $order): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($order['nama_produk'] ?? 'Produk Tidak Ditemukan') ?></td>
                                    <td><?= date('d M Y, H:i', strtotime($order['created_at'])) ?></td>
                                    <td><?= esc($order['jumlah']) ?></td>
                                    <td>Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                                    <td>
                                        <?php 
                                            $badgeClass = 'bg-secondary';
                                            if ($order['status'] == 'Completed') $badgeClass = 'bg-success';
                                            if ($order['status'] == 'Pending') $badgeClass = 'bg-warning text-dark';
                                            if ($order['status'] == 'Canceled') $badgeClass = 'bg-danger';
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= esc($order['status']) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="text-end mt-4">
        <a href="<?= route_to('user_dashboard'); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    </div>

</div>
<?= $this->endSection() ?>