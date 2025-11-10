<?php $this->extend('admin/layout') ?> 

<?php $this->section('content') ?>

<?php
    // Ambil variabel dari controller
    $nama_aplikasi = old('nama_aplikasi', $settings['nama_aplikasi'] ?? '');
    $email_kontak  = old('email_kontak', $settings['email_kontak'] ?? '');
    $status_sistem = old('status_sistem', $settings['status_sistem'] ?? 'Aktif (Online)');
?>

<div class="container-fluid p-0">
    
    <!-- Area Notifikasi -->
    <?php if (!empty($pesan)): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> <?= esc($pesan); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <!-- Area Error Input -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger shadow-sm alert-dismissible fade show" role="alert">
            <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i> Kesalahan Input:</h6>
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <!-- Card Pengaturan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Pengaturan Sistem</h6>
        </div>
        <div class="card-body">
            <p>Kelola pengaturan umum sistem, seperti nama koperasi, alamat kontak, dan status operasional.</p>
            <hr>
            
            <!-- ========================================================== -->
            <!-- == FORM INI SEKARANG FUNGSIONAL == -->
            <!-- ========================================================== -->
            <form action="<?= route_to('setting_update') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Nama Aplikasi / Koperasi -->
                <div class="row mb-3">
                    <label for="nama_aplikasi" class="col-sm-3 col-form-label">Nama Aplikasi / Koperasi:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_aplikasi" name="nama_aplikasi" 
                               value="<?= esc($nama_aplikasi) ?>" required>
                    </div>
                </div>

                <!-- Email Kontak -->
                <div class="row mb-3">
                    <label for="email_kontak" class="col-sm-3 col-form-label">Email Kontak:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email_kontak" name="email_kontak" 
                               value="<?= esc($email_kontak) ?>" required>
                    </div>
                </div>

                <!-- Status Sistem -->
                <div class="row mb-3">
                    <label for="status_sistem" class="col-sm-3 col-form-label">Status Sistem:</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="status_sistem" name="status_sistem">
                            <option value="Aktif (Online)" <?= ($status_sistem == 'Aktif (Online)') ? 'selected' : '' ?>>
                                Aktif (Online)
                            </option>
                            <option value="Maintenance (Offline)" <?= ($status_sistem == 'Maintenance (Offline)') ? 'selected' : '' ?>>
                                Maintenance (Offline)
                            </option>
                        </select>
                        <div class="form-text">
                            Jika 'Maintenance', pengguna non-admin tidak akan bisa mengakses situs publik.
                        </div>
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <hr>
                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary shadow-sm">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
