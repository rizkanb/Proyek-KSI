<?php $this->extend('layout/user_layout') // <-- PENTING: Memanggil layout ?>

<?php $this->section('content') // <-- PENTING: Memulai konten ?>

<div class="container">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body p-4 p-md-5">

            <h1 class="fw-bold text-dark mb-3">Selamat Datang, <?= esc(session()->get('nama') ?? 'Pengguna') ?>!</h1>
            
            <p class="lead text-muted">
                Ini adalah halaman dashboard ayu tri sry di Koperasi Digital.
            </p>
            <p>
                Dari sini Anda dapat mengelola profil Anda, melihat riwayat pembelian, dan membeli produk koperasi.
            </p>
            
            <hr class="my-4">

            <h4 class="fw-bold text-dark mb-3">Menu Cepat</h4>
            <div class="row g-3">
                <div class="col-md-4">
                    <a href="<?= route_to('user_buy') ?>" class="text-decoration-none">
                        <div class="card text-center h-100 p-3 card-hover shadow-sm">
                            <i class="fas fa-shopping-basket fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold">Beli Produk</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?= route_to('user_history') ?>" class="text-decoration-none">
                        <div class="card text-center h-100 p-3 card-hover shadow-sm">
                            <i class="fas fa-history fa-3x text-success mb-3"></i>
                            <h5 class="fw-bold">Riwayat Pesanan</h5>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?= route_to('user_profile') ?>" class="text-decoration-none">
                        <div class="card text-center h-100 p-3 card-hover shadow-sm">
                            <i class="fas fa-user-edit fa-3x text-warning mb-3"></i>
                            <h5 class="fw-bold">Edit Profil</h5>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->endSection() // <-- Mengakhiri konten ?>

