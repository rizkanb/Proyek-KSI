<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('title') ?>
    Laporan Penjualan | Koperasi Penjualan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container">
        <h1>Laporan Penjualan</h1>
        <p class="lead-text">Lihat laporan dan statistik penjualan koperasi.</p>
        
        <!-- Konten laporan dan grafik akan ditampilkan di sini -->
        <p>Konten laporan penjualan akan ditampilkan di sini.</p>
        
        <a href="<?= base_url('dashboard') ?>" class="back-link">
            Kembali ke Dashboard
        </a>
    </div>
<?= $this->endSection() ?>
