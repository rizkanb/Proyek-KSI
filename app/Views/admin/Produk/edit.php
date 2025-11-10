<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Judul Halaman -->
            <h1 class="h3 mb-4 text-gray-800"><?= esc($content_title ?? 'Edit Produk') ?></h1>

            <!-- Menampilkan Error Validasi (jika ada) -->
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <h6><i class="fas fa-exclamation-triangle"></i> Gagal Memperbarui:</h6>
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Card Form Edit -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Produk: <?= esc($produk['nama_produk'] ?? '') ?></h6>
                    <a href="<?= site_url('dashboard/produk') ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Batal dan Kembali
                    </a>
                </div>
                <div class="card-body">
                    <!-- Form menunjuk ke method 'update' -->
                    <form action="<?= site_url('dashboard/produk/update/' . $produk['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <!-- CATATAN: Beberapa controller CI4 memerlukan input _method 'PUT' untuk update -->
                        <!-- <input type="hidden" name="_method" value="PUT"> -->
                        
                        <?php
                        // Daftar jurusan yang BENAR (samakan dengan di index.php)
                        $daftar_jurusan = [
                            "Ekonomi Bisnis", 
                            "Peternakan", 
                            "Budidaya Tanaman Pangan", 
                            "Teknologi Informasi"
                        ];

                        // Ambil jurusan produk saat ini, atau dari input lama jika ada error validasi
                        $produk_jurusan = old('jurusan', $produk['jurusan'] ?? '');
                        ?>

                        <div class="form-group row">
                            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" 
                                       value="<?= esc(old('nama_produk', $produk['nama_produk'] ?? '')) ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= esc(old('deskripsi', $produk['deskripsi'] ?? '')) ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga (Rp)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga" name="harga" 
                                       value="<?= esc(old('harga', $produk['harga'] ?? '')) ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stok" name="stok" 
                                       value="<?= esc(old('stok', $produk['stok'] ?? '')) ?>" required>
                            </div>
                        </div>

                        <!-- ======================================================== -->
                        <!-- == BAGIAN UTAMA YANG DIPERBAIKI ADA DI SINI (SELECT) == -->
                        <!-- ======================================================== -->
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jurusan" name="jurusan" required>
                                    <option value="">-- Pilih Jurusan --</option>
                                    
                                    <?php foreach ($daftar_jurusan as $j) : ?>
                                        <option value="<?= esc($j) ?>" <?= ($produk_jurusan == $j) ? 'selected' : '' ?>>
                                            <?= esc($j) ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <!-- ======================================================== -->

                        <hr>
                        
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
