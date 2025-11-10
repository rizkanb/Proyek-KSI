<?php $this->extend('layout/user_layout') // <-- PENTING: Memanggil layout ?>

<?php $this->section('content') // <-- PENTING: Memulai konten ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body p-4 p-md-5">
                    
                    <div class="text-center mb-4">
                        <img src="https://placehold.co/100x100/0d6efd/ffffff?text=<?= substr(session()->get('nama') ?? 'U', 0, 1) ?>" 
                             alt="Foto Profil" 
                             class="rounded-circle" 
                             style="width: 100px; height: 100px; object-fit: cover; border: 4px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    </div>

                    <h2 class="fw-bold text-dark mb-3 text-center">Profil Saya</h2>
                    <p class="text-muted text-center mb-4">
                        Kelola informasi profil Anda di halaman ini.
                    </p>
                    <hr>
                    
                    <!-- Form untuk update data profil dasar -->
                    <form action="<?= route_to('user_update_profile') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <h5 class="fw-bold text-dark mt-4 mb-3">Informasi Dasar</h5>
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control form-control-lg" value="<?= esc(session()->get('nama') ?? 'Pelanggan') ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?= esc(session()->get('email') ?? 'email@anda.com') ?>" readonly>
                            <div class="form-text">Email tidak dapat diubah.</div>
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="tel" id="telepon" name="telepon" class="form-control form-control-lg" value="<?= esc(session()->get('telepon') ?? '') ?>" placeholder="Masukkan nomor telepon Anda">
                        </div>
                        
                        <div class="d-grid gap-2 col-6 mx-auto mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-1"></i>
                                Simpan Informasi
                            </button>
                        </div>
                    </form>

                    <hr class="my-5">

                    <!-- Form untuk ubah kata sandi -->
                    <form action="<?= route_to('user_change_password') ?>" method="post">
                         <?= csrf_field() ?>
                        
                        <h5 class="fw-bold text-dark mt-4 mb-3">Ubah Kata Sandi</h5>
                        
                        <div class="mb-3">
                            <label for="pass_lama" class="form-label">Kata Sandi Lama</label>
                            <input type="password" id="pass_lama" name="pass_lama" class="form-control form-control-lg" placeholder="Masukkan kata sandi lama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass_baru" class="form-label">Kata Sandi Baru</label>
                            <input type="password" id="pass_baru" name="pass_baru" class="form-control form-control-lg" placeholder="Masukkan kata sandi baru" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass_konfirmasi" class="form-label">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" id="pass_konfirmasi" name="pass_konfirmasi" class="form-control form-control-lg" placeholder="Ulangi kata sandi baru" required>
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto mt-4">
                            <button type="submit" class="btn btn-outline-danger btn-lg">
                                <i class="fas fa-key me-1"></i>
                                Ubah Kata Sandi
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() // <-- Mengakhiri konten ?>

