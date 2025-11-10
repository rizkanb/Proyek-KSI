<?= $this->extend('templates/dashboard_template') ?>

<?= $this->section('title') ?>
    Data Barang | Koperasi Penjualan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container">
        <h1>Kelola Data Barang</h1>
        <p class="lead-text">Ini adalah halaman untuk melihat, menambah, mengedit, dan menghapus data barang.</p>
        
        <!-- Di sini akan ada konten seperti tabel daftar barang, tombol tambah, dan lainnya -->
        <p>Konten data barang akan ditampilkan di sini.</p>
        
        <a href="<?= base_url('dashboard') ?>" class="back-link">
            Kembali ke Dashboard
        </a>
    </div>
<?= $this->endSection() ?>
