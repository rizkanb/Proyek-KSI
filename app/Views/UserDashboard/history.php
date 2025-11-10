<?php $this->extend('layout/user_layout') // <-- PENTING: Memanggil layout ?>

<?php $this->section('content') // <-- PENTING: Memulai konten ?>

<div class="container">
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body p-4 p-md-5">
            <h2 class="fw-bold text-dark mb-3">Riwayat Pemesanan</h2>
            <p class="text-muted mb-4">
                Semua riwayat transaksi dan status pesanan Anda akan muncul di sini.
            </p>
            
            <!-- Filter Riwayat (Contoh) -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label for="filterStatus" class="form-label">Filter Status:</label>
                    <select id="filterStatus" class="form-select">
                        <option value="semua">Semua Status</option>
                        <option value="selesai">Selesai</option>
                        <option value="diproses">Diproses</option>
                        <option value="dibatalkan">Dibatalkan</option>
                    </select>
                </div>
            </div>

            <!-- Daftar Riwayat - Menggunakan Tabel -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Total</th>
                            <th scope="col" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Item Riwayat 1 (Selesai) -->
                        <tr>
                            <td class="fw-bold">#KOP-12345</td>
                            <td>28 Okt 2025</td>
                            <td>Bakso (x2), Ikan (x1)</td>
                            <td>Rp 46.000</td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-success px-3 py-2">Selesai</span>
                            </td>
                        </tr>
                        
                        <!-- Contoh Item Riwayat 2 (Diproses) -->
                        <tr>
                            <td class="fw-bold">#KOP-12344</td>
                            <td>25 Okt 2025</td>
                            <td>Mi Ayam (x5)</td>
                            <td>Rp 60.000</td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-warning text-dark px-3 py-2">Diproses</span>
                            </td>
                        </tr>
                        
                        <!-- Contoh Item Riwayat 3 (Dibatalkan) -->
                        <tr>
                            <td class="fw-bold">#KOP-12340</td>
                            <td>20 Okt 2025</td>
                            <td>Marcindes (x1)</td>
                            <td>Rp 50.000</td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-danger px-3 py-2">Dibatalkan</span>
                            </td>
                        </tr>

                        <!-- Nanti, jika data $riwayat (dari controller) kosong, tampilkan ini -->
                        <!--
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-info text-center my-3">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Anda belum memiliki riwayat pemesanan.
                                </div>
                            </td>
                        </tr>
                        -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php $this->endSection() // <-- Mengakhiri konten ?>

