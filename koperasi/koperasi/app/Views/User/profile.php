<!-- 
Lokasi file: app/Views/user/profile.php
Dipanggil oleh: App\Controllers\UserDashboard::profile()
Menggunakan data $user yang dikirim dari controller.
-->
<?= $this->extend('layouts/user_template') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="fw-bold mb-4 text-primary"><i class="fas fa-edit me-2"></i> Edit Profil Anda</h2>
            
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

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <!-- Form akan dikirim ke UserDashboard::updateProfile() -->
                    <form action="<?= route_to('user_update_profile'); ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Nama Pelanggan -->
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" 
                                value="<?= old('nama_pelanggan', $user['nama_pelanggan'] ?? ''); ?>" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <!-- Email tidak bisa diubah karena digunakan untuk login/identifikasi -->
                            <input type="email" class="form-control" id="email" name="email" 
                                value="<?= esc($user['email'] ?? ''); ?>" disabled>
                            <small class="text-muted">Email tidak dapat diubah.</small>
                        </div>

                        <!-- Telepon -->
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" 
                                value="<?= old('telepon', $user['telepon'] ?? ''); ?>">
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= old('alamat', $user['alamat'] ?? ''); ?></textarea>
                        </div>
                        
                        <!-- Password (Opsional) -->
                        <hr>
                        <h6 class="text-muted mb-3">Ubah Password (Isi hanya jika ingin mengubah)</h6>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                         <div class="mb-4">
                            <label for="pass_confirm" class="form-label">Ulangi Password Baru</label>
                            <input type="password" class="form-control" id="pass_confirm" name="pass_confirm">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?= route_to('user_dashboard'); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>