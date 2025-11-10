<?php $this->extend('admin/layout') ?>

<?php $this->section('content') ?>

<div class="container-fluid p-0">

    <!-- 
      Ambil data yang dikirim dari Setting::index()
      $settings adalah array ['app_name' => '...', 'contact_email' => '...']
    -->
    <?php
    $app_name = $settings['app_name'] ?? 'Koperasi Keren';
    $contact_email = $settings['contact_email'] ?? 'admin@koperasi.com';
    $current_status = $settings['status'] ?? 'Aktif (Online)';
    ?>

    <!-- Area Notifikasi -->
    <?php if (!empty($success)) : ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> <?= esc($success); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger shadow-sm">
            <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i> Kesalahan Input:</h6>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>


    <!-- Card Pengaturan -->
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h4 class="card-title m-0">Pengaturan Aplikasi</h4>
            <small class="card-subtitle text-muted">Kelola pengaturan umum sistem, seperti nama koperasi, alamat kontak, dan status operasional.</small>
        </div>
        
        <!-- Form ini akan mengirim data ke Setting::save() -->
        <form action="<?= route_to('setting_save'); ?>" method="post">
            
            <?= csrf_field(); ?>
            <div class="card-body p-4">

                <!-- Input Nama Aplikasi -->
                <div class="mb-3 row">
                    <label for="app_name" class="col-sm-3 col-form-label fw-bold">Nama Aplikasi / Koperasi:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="app_name" name="app_name" 
                               value="<?= esc($app_name); ?>" required>
                    </div>
                </div>
                
                <hr class="my-4">

                <!-- Input Email Kontak -->
                <div class="mb-3 row">
                    <label for="contact_email" class="col-sm-3 col-form-label fw-bold">Email Kontak:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="contact_email" name="contact_email" 
                               value="<?= esc($contact_email); ?>" required>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Pilihan Status Sistem -->
                <div class="mb-3 row">
                    <label for="status" class="col-sm-3 col-form-label fw-bold">Status Sistem:</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="status" name="status">
                            <option value="Aktif (Online)" <?= ($current_status == 'Aktif (Online)') ? 'selected' : '' ?>>
                                Aktif (Online)
                            </option>
                            <option value="Offline (Maintenance)" <?= ($current_status == 'Offline (Maintenance)') ? 'selected' : '' ?>>
                                Offline (Maintenance)
                            </option>
                        </select>
                        <small class="text-muted">Jika 'Offline', pengguna (selain admin) tidak akan bisa mengakses website.</small>
                    </div>
                </div>

            </div>
            <div class="card-footer text-end bg-light p-3">
                <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>

<?php $this->endSection() ?>

