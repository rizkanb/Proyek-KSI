<?= $this->extend('templates/layout_admin') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= esc($content_title ?? 'Daftar Pemesanan') ?></h1>
    <p class="mb-4">Berikut adalah daftar semua data pemesanan yang masuk.</p>

    <!-- Tombol Tambah -->
    <a href="<?= base_url('dashboard/pemesanan/tambah') ?>" class="btn btn-primary btn-icon-split mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Pemesanan Manual</span>
    </a>

    <!-- Tampilkan Pesan Sukses/Error -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Pastikan id="dataTable" agar script sorting/pencarian berjalan -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <!-- 
                        [PERBAIKAN]
                        Bagian <tfoot> di bawah ini dihapus karena menyebabkan header duplikat
                        di bagian bawah tabel, seperti di screenshot Anda.
                    -->
                    <tbody>
                        <?php $i = 1; ?>
                        <?php if (!empty($pemesanan)): ?>
                            <?php foreach ($pemesanan as $pesan): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <!-- Pastikan format tanggal jika 'created_at' adalah datetime lengkap -->
                                    <td><?= esc(date('d M Y', strtotime($pesan['created_at'] ?? 'now'))) ?></td>
                                    <td><?= esc($pesan['nama_pelanggan'] ?? 'N/A') ?></td>
                                    <td><?= esc($pesan['nama_produk'] ?? 'N/A') ?></td>
                                    <td><?= esc($pesan['jumlah']) ?></td>
                                    <td>Rp <?= number_format($pesan['total_harga'], 0, ',', '.') ?></td>
                                    <td>
                                        <!-- Logika Badge Status -->
                                        <?php 
                                            $status = $pesan['status'];
                                            $badgeClass = 'badge-secondary'; // Default
                                            if ($status == 'Selesai') $badgeClass = 'badge-success';
                                            if ($status == 'Proses') $badgeClass = 'badge-info';
                                            if ($status == 'Pending') $badgeClass = 'badge-warning';
                                            if ($status == 'Batal') $badgeClass = 'badge-danger';
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= esc($status) ?></span>
                                    </td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <a href="<?= base_url('dashboard/pemesanan/detail/' . $pesan['id']) ?>" class="btn btn-info btn-sm btn-circle" title="Detail">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="<?= base_url('dashboard/pemesanan/hapus/' . $pesan['id']) ?>" class="btn btn-danger btn-sm btn-circle" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data pemesanan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<!-- Script Tambahan untuk DataTables (jika Anda menggunakannya) -->
<?= $this->section('page_scripts') ?>
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[ 0, "asc" ]] // Urutkan berdasarkan kolom No. (index 0)
            });
        });
    </script>
<?= $this->endSection() ?>

