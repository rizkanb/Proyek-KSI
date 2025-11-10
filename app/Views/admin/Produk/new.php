<?= $this->extend('templates/layout_admin') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= esc($content_title ?? 'Tambah Produk Baru') ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Produk</h6>
        </div>
        <div class="card-body">
            
            <!-- Tampilkan error validasi jika ada -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <strong>Gagal menyimpan:</strong>
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Arahkan form ke method 'save' (sesuai Routes.php 'produk_management_save') -->
            <form action="<?= base_url('dashboard/produk/save') ?>" method="POST">
                <?= csrf_field() ?> <!-- CSRF Token -->

                <!-- Nama Produk -->
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control <?= (session('errors.nama_produk')) ? 'is-invalid' : '' ?>" 
                           id="nama_produk" name="nama_produk" 
                           value="<?= old('nama_produk') ?>" required>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_produk') ?>
                    </div>
                </div>

                <!-- Harga -->
                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" class="form-control <?= (session('errors.harga')) ? 'is-invalid' : '' ?>" 
                           id="harga" name="harga" min="0" 
                           value="<?= old('harga', '0') ?>" required>
                    <div class="invalid-feedback">
                        <?= session('errors.harga') ?>
                    </div>
                </div>

                <!-- Stok -->
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control <?= (session('errors.stok')) ? 'is-invalid' : '' ?>" 
                           id="stok" name="stok" min="0" 
                           value="<?= old('stok', '0') ?>" required>
                    <div class="invalid-feedback">
                        <?= session('errors.stok') ?>
                    </div>
                </div>

                <!-- [PERBAIKAN] Dropdown Jurusan disesuaikan dengan screenshot -->
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control <?= (session('errors.jurusan')) ? 'is-invalid' : '' ?>" 
                            id="jurusan" name="jurusan" required>
                        <?php $selectedJurusan = old('jurusan'); ?>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Ekonomi Bisnis" <?= ($selectedJurusan == 'Ekonomi Bisnis') ? 'selected' : '' ?>>Ekonomi Bisnis</option>
                        <option value="Peternakan" <?= ($selectedJurusan == 'Peternakan') ? 'selected' : '' ?>>Peternakan</option>
                        <option value="Budidaya Tanaman Pangan" <?= ($selectedJurusan == 'Budidaya Tanaman Pangan') ? 'selected' : '' ?>>Budidaya Tanaman Pangan</option>
                        <option value="Teknologi Informasi" <?= ($selectedJurusan == 'Teknologi Informasi') ? 'selected' : '' ?>>Teknologi Informasi</option>
                        <option value="Umum" <?= ($selectedJurusan == 'Umum') ? 'selected' : '' ?>>Umum</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= session('errors.jurusan') ?>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label for="deskripsi">Deskripsi (Opsional)</label>
                    <textarea class="form-control <?= (session('errors.deskripsi')) ? 'is-invalid' : '' ?>" 
                              id="deskripsi" name="deskripsi" rows="4"><?= old('deskripsi') ?></textarea>
                    <div class="invalid-feedback">
                        <?= session('errors.deskripsi') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                <a href="<?= base_url('dashboard/produk') ?>" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>

</div>
<?= $this->endSection() ?>

