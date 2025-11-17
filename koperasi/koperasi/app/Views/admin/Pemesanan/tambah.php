<?= $this->extend('templates/layout_admin') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= esc($content_title ?? 'Tambah Pemesanan') ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Pemesanan</h6>
        </div>
        <div class="card-body">
            
            <!-- Tampilkan error validasi JIKA ADA -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal menyimpan data:</strong>
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <!-- Tampilkan pesan error custom dari Controller (jika produk/harga tidak valid) -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal:</strong> <?= session()->getFlashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>


            <!-- Arahkan form ke method 'simpan' (sesuai Routes.php) -->
            <!-- Kita gunakan route_to() agar lebih aman -->
            <form action="<?= route_to('pemesanan_simpan') ?>" method="POST">
                <?= csrf_field() ?> <!-- CSRF Token -->

                <!-- Pilih Pelanggan (User) -->
                <div class="form-group">
                    <label for="user_id">Pilih Pelanggan</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>" <?= (old('user_id') == $user['id']) ? 'selected' : '' ?>>
                                    <!-- Pastikan nama kolom 'username' dan 'nama_lengkap' benar -->
                                    <?= esc($user['username']) ?> (<?= esc($user['nama_lengkap'] ?? 'Nama tidak ada') ?>)
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>Data pelanggan tidak ditemukan</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Pilih Produk -->
                <div class="form-group">
                    <label for="produk_id">Pilih Produk</label>
                    <select class="form-control" id="produk_id" name="produk_id" required>
                        <option value="">-- Pilih Produk --</option>
                         <?php if (!empty($produk)): ?>
                            <?php foreach ($produk as $item): ?>
                                <option value="<?= $item['id'] ?>" <?= (old('produk_id') == $item['id']) ? 'selected' : '' ?>>
                                    <!-- Pastikan nama kolom 'nama_produk' dan 'harga' benar -->
                                    <?= esc($item['nama_produk']) ?> (Rp <?= number_format($item['harga'] ?? 0, 0, ',', '.') ?>)
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>Data produk tidak ditemukan</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Jumlah -->
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="<?= old('jumlah', 1) ?>" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status Pemesanan</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Pending" <?= (old('status', 'Pending') == 'Pending') ? 'selected' : '' ?>>Pending</option>
                        <option value="Proses" <?= (old('status') == 'Proses') ? 'selected' : '' ?>>Proses</option>
                        <option value="Selesai" <?= (old('status') == 'Selesai') ? 'selected' : '' ?>>Selesai</option>
                        <option value="Batal" <?= (old('status') == 'Batal') ? 'selected' : '' ?>>Batal</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Pemesanan</button>
                <a href="<?= base_url('dashboard/pemesanan') ?>" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>

</div>
<?= $this->endSection() ?>

