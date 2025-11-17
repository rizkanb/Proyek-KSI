<?php $this->extend('admin/layout') ?>

<?php $this->section('content') ?>

<div class="container-fluid p-0">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-dark"><?= esc($content_title ?? 'Formulir Anggota Baru') ?></h2>
        <a href="<?= route_to('anggota_list'); ?>" class="btn btn-outline-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <!-- Area Error Input -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger shadow-sm">
            <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i> Kesalahan Input:</h6>
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            
            <!-- 
                INI ADALAH SOLUSI UNTUK ERROR 404 ANDA:
                Action form diarahkan ke 'anggota_create' (POST), 
                bukan 'anggota_new' (GET).
            -->
            <form action="<?= route_to('anggota_create'); ?>" method="post">
                <?= csrf_field(); ?>
                
                <div class="mb-3">
                    <label for="nama_anggota" class="form-label fw-bold">Nama Anggota</label>
                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?= old('nama_anggota') ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label fw-bold">Telepon (Opsional)</label>
                    <input type="tel" class="form-control" id="telepon" name="telepon" value="<?= old('telepon') ?>">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat (Opsional)</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= old('alamat') ?></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-save me-1"></i> Simpan Anggota
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<?php $this->endSection() ?>

