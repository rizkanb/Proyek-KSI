<?php $this->extend('admin/layout') ?>

<?php $this->section('content') ?>

<div class="container-fluid p-0">

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-dark"><?= esc($content_title ?? 'Daftar Anggota') ?></h2>
        <a href="<?= route_to('anggota_new'); ?>" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Tambah Anggota Baru
        </a>
    </div>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Tabel Daftar Anggota -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data_anggota)) : ?>
                        <?php foreach ($data_anggota as $anggota) : ?>
                            <tr>
                                <td><?= esc($anggota['id']); ?></td>
                                <td><?= esc($anggota['nama_anggota']); ?></td>
                                <td><?= esc($anggota['email']); ?></td>
                                <td><?= esc($anggota['telepon']); ?></td>
                                <td><?= esc($anggota['alamat']); ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm me-1"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data anggota.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php $this->endSection() ?>
