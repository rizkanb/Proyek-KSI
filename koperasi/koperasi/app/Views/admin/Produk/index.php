<?php $this->extend('admin/layout') ?> 

<?php $this->section('content') ?>

<div class="container-fluid p-0">
    
    <div class="header-controls">
        <!-- ================================================== -->
        <!-- == JUDUL GANDA DIHAPUS DARI SINI == -->
        <!-- ================================================== -->
        <!-- <h2 class="fw-bold text-dark">...Daftar Produk Koperasi...</h2> -->
        
        <a href="<?= route_to('dashboard'); ?>" class="btn btn-outline-secondary btn-sm shadow-sm ms-auto">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    </div>
    
    <?php
        // Mengambil variabel
        $activeJurusan = $jurusan ?? ''; 
        $listProduk = $data_produk ?? []; 
        $listJurusan = [
            'Ekonomi Bisnis' => 'warning',
            'Peternakan' => 'success',
            'Budidaya Tanaman Pangan' => 'primary',
            'Teknologi Informasi' => 'info'
        ];
        $pesan = session()->getFlashdata('pesan');
        $errors = session()->getFlashdata('errors');
    ?>

    <!-- Area Notifikasi -->
    <?php if ($pesan): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> <?= esc($pesan); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($errors): ?>
    <div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
            <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i> Kesalahan Input:</h6>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Pilihan Filter Jurusan (Sudah Benar) -->
    <div class="row g-3 mb-4">
        <div class="col-md-auto">
            <a href="<?= route_to('produk_management'); ?>" class="text-decoration-none">
                <div class="card text-center jurusan-card shadow-sm <?= empty($activeJurusan) ? 'active border-left-dark' : '' ?>" style="--bs-border-color: #212529;">
                    <div class="card-body py-3">
                        <h5 class="card-title text-dark">Semua Jurusan</h5>
                    </div>
                </div>
            </a>
        </div>
        <?php foreach ($listJurusan as $nama => $color): ?>
        <?php 
            $isActive = ($activeJurusan === $nama);
            $urlFilter = route_to('produk_management') . '?jurusan=' . urlencode($nama);
        ?>
        <div class="col-md-auto">
            <a href="<?= $urlFilter; ?>" class="text-decoration-none">
                <div class="card text-center jurusan-card shadow-sm <?= $isActive ? 'active border-left-' . $color . ' bg-opacity-75' : '' ?>" 
                    style="--bs-primary: var(--bs-<?= $color ?>); border-left-color: var(--bs-<?= $color ?>) !important;">
                    <div class="card-body py-3">
                        <h5 class="card-title text-<?= $isActive ? 'dark' : $color ?>"><?= esc($nama); ?></h5>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Form Tambah Produk -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0 font-weight-bold">Tambah Produk Baru</h5>
        </div>
        <div class="card-body">
            <!-- ========================================================== -->
            <!-- == PERBAIKAN 'action' FORM UNTUK 'TAMBAH PRODUK' == -->
            <!-- ========================================================== -->
            <form action="<?= route_to('produk_management_create'); ?>" method="post" class="row g-2 align-items-center">
                <?= csrf_field() ?>
                <div class="col-md-2"><input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required value="<?= old('nama_produk') ?>"></div>
                <div class="col-md-2"><input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?= old('deskripsi') ?>"></div>
                <div class="col-md-2"><input type="number" name="harga" class="form-control" placeholder="Harga (Rp)" required value="<?= old('harga') ?>"></div>
                <div class="col-md-1"><input type="number" name="stok" class="form-control" placeholder="Stok" required value="<?= old('stok') ?>"></div>
                <div class="col-md-3">
                    <select name="jurusan" class="form-select" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Ekonomi Bisnis" <?= (old('jurusan') == 'Ekonomi Bisnis' ? 'selected' : '') ?>>Ekonomi Bisnis</option>
                        <option value="Peternakan" <?= (old('jurusan') == 'Peternakan' ? 'selected' : '') ?>>Peternakan</option>
                        <option value="Budidaya Tanaman Pangan" <?= (old('jurusan') == 'Budidaya Tanaman Pangan' ? 'selected' : '') ?>>Budidaya Tanaman Pangan</option>
                        <option value="Teknologi Informasi" <?= (old('jurusan') == 'Teknologi Informasi' ? 'selected' : '') ?>>Teknologi Informasi</option>
                    </select>
                </div>
                <div class="col-md-2"><button type="submit" class="btn btn-success w-100"><i class="fas fa-plus-circle me-1"></i> Tambah</button></div>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Produk -->
    <table class="table table-bordered table-hover bg-white shadow">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Jurusan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($listProduk)): ?>
                <?php foreach($listProduk as $row): ?>
                <tr>
                    <td><?= esc($row['nama_produk']); ?></td> 
                    <td><?= esc($row['deskripsi']); ?></td>
                    <td class="fw-bold text-success">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td class="text-center <?= ($row['stok'] < 5) ? 'text-danger fw-bold' : '' ?>"><?= esc($row['stok']); ?></td>
                    <!-- Menampilkan Jurusan dengan badge -->
                    <td>
                        <?php if (!empty($row['jurusan'])): ?>
                            <span class="badge bg-<?= $listJurusan[$row['jurusan']] ?? 'secondary' ?> text-dark">
                                <?= esc($row['jurusan']); ?>
                            </span>
                        <?php else: ?>
                            <span class="text-muted fst-italic">N/A</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= route_to('produk_management_edit', $row['id']); ?>" class="btn btn-warning btn-sm me-1"><i class="fas fa-edit"></i> Edit</a>
                        
                        <!-- Form Hapus (Sudah Benar) -->
                        <form action="<?= route_to('produk_management_delete', $row['id']); ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk <?= esc($row['nama_produk']); ?>?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center py-4 text-muted"><i class="fas fa-search-minus me-1"></i> Tidak ada produk ditemukan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $this->endSection() ?>

