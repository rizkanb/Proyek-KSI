<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <h2>Pilih Jenis Laporan</h2>
        <p>Silakan pilih laporan yang ingin Anda lihat atau cetak.</p>
        
        <div style="display: flex; gap: 20px; margin-top: 30px;">
            <div style="border: 1px solid #eee; padding: 20px; border-radius: 8px; flex: 1;">
                <h3><i class="fas fa-chart-bar"></i> Laporan Penjualan</h3>
                <p>Melihat ringkasan pendapatan dan total transaksi.</p>
                <a href="<?= route_to('laporan_penjualan') ?>" class="btn-add">Lihat Laporan</a>
            </div>
            
            <div style="border: 1px solid #eee; padding: 20px; border-radius: 8px; flex: 1;">
                <h3><i class="fas fa-users"></i> Laporan Anggota</h3>
                <p>Melihat pertumbuhan dan aktivitas anggota baru.</p>
                <a href="#" class="btn-add" style="background-color: #007bff;">Lihat Laporan</a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
