<?= $this->extend('templates/layout_admin') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= esc($content_title ?? 'Detail Pemesanan') ?></h1>
    
    <!-- Tampilkan notifikasi success/error -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Kolom Detail Pesanan -->
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pesanan</h6>
                </div>
                <div class="card-body">
                    <?php if (empty($pesanan)): ?>
                        <p>Data pesanan tidak ditemukan.</p>
                    <?php else: ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Pesanan</th>
                                <td><?= esc($pesanan['id']) ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <td><?= esc(date('d M Y, H:i', strtotime($pesanan['created_at'] ?? date('Y-m-d')))) ?></td>
                            </tr>
                            <tr>
                                <th>Produk</th>
                                <td><?= esc($pesanan['nama_produk']) ?></td>
                            </tr>
                            <tr>
                                <th>Harga Satuan</th>
                                <td>Rp <?= esc(number_format($pesanan['harga_satuan'] ?? 0, 0, ',', '.')) ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td><?= esc($pesanan['jumlah']) ?></td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td class="font-weight-bold">Rp <?= esc(number_format($pesanan['total_harga'], 0, ',', '.')) ?></td>
                            </tr>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Kolom Info Pelanggan & Status -->
        <div class="col-lg-5">
            <?php if (!empty($pesanan)): ?>
                <!-- Info Pelanggan -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Pelanggan</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td><?= esc($pesanan['nama_pelanggan']) ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?= esc($pesanan['telepon'] ?? 'N/A') ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($pesanan['alamat'] ?? 'N/A') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Update Status -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Status</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('dashboard/pemesanan/update-status/' . $pesanan['id']) ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="status">Status Saat Ini</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Pending" <?= $pesanan['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Proses" <?= $pesanan['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
                                    <option value="Selesai" <?= $pesanan['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                    <option value="Batal" <?= $pesanan['status'] == 'Batal' ? 'selected' : '' ?>>Batal</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <a href="<?= base_url('dashboard/pemesanan') ?>" class="btn btn-secondary mb-4">Kembali ke Daftar Pemesanan</a>

</div>
<?= $this->endSection() ?>

