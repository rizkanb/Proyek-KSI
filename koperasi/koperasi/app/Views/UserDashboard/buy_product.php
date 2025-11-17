<?php $this->extend('layout/user_layout') // <-- PENTING: Memanggil layout ?>

<?php $this->section('content') // <-- PENTING: Memulai konten ?>

<div class="container">
    <h2 class="mb-4 fw-bold text-dark">Beli Produk Koperasi</h2>

    <!-- 1. FILTER JURUSAN -->
    <div class="card shadow-sm mb-4 border-0" style="border-radius: 12px;">
        <div class="card-body">
            <label for="filter_jurusan" class="form-label fw-bold">Filter berdasarkan Jurusan/Prodi:</label>
            <select id="filter_jurusan" class="form-select form-select-lg">
                <option value="semua">-- Tampilkan Semua Jurusan --</option>
                <?php if (!empty($listJurusan)): ?>
                    <?php foreach ($listJurusan as $jurusan): ?>
                        <option value="<?= esc($jurusan['jurusan']) ?>">
                            <?= esc($jurusan['jurusan']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>

    <!-- 2. DAFTAR PRODUK (GRID) -->
    <div id="product-list" class="row g-4">
        
        <?php if (!empty($listProduk)): ?>
            <?php foreach ($listProduk as $produk): ?>
                <!-- 
                    Setiap kartu produk memiliki data-jurusan
                    agar bisa difilter oleh JavaScript 
                -->
                <div class="col-md-6 col-lg-4 product-card-wrapper" data-jurusan="<?= esc($produk['jurusan']) ?>">
                    <div class="card h-100 product-card">
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge badge-jurusan"><?= esc($produk['jurusan']) ?></span>
                            </div>
                            <h5 class="card-title fw-bold text-primary"><?= esc($produk['nama_produk']) ?></h5>
                            <p class="card-text text-muted flex-grow-1"><?= esc($produk['deskripsi']) ?></p>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="product-price">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></span>
                                <span class="stok">Stok: <?= esc($produk['stok']) ?></span>
                            </div>
                            
                            <!-- Form Pembelian per Produk -->
                            <form action="<?= route_to('user_process_order') ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="product_id" value="<?= esc($produk['id']) ?>">
                                
                                <div class="input-group">
                                    <input type="number" class="form-control" name="quantity" value="1" min="1" max="<?= esc($produk['stok']) ?>" required>
                                    <button type="submit" class="btn btn-beli">
                                        <i class="fas fa-shopping-cart me-1"></i> Beli
                                    </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada produk yang dijual saat ini.
                </div>
            </div>
        <?php endif; ?>

        <!-- Pesan jika tidak ada hasil filter -->
        <div id="no-result-message" class="col-12" style="display: none;">
            <div class="alert alert-warning text-center">
                Tidak ada produk yang ditemukan untuk jurusan tersebut.
            </div>
        </div>

    </div>
</div>

<?php $this->endSection() // <-- PENTING: Mengakhiri konten ?>


<?php $this->section('pageScripts') // <-- PENTING: Memulai script ?>
<!-- JavaScript untuk filter produk -->
<script>
    document.getElementById('filter_jurusan').addEventListener('change', function() {
        let selectedJurusan = this.value;
        let productCards = document.querySelectorAll('.product-card-wrapper');
        let foundProduct = false;

        productCards.forEach(function(card) {
            let cardJurusan = card.getAttribute('data-jurusan');
            
            // Tampilkan kartu jika jurusannya cocok ATAU "semua" dipilih
            if (selectedJurusan === 'semua' || selectedJurusan === cardJurusan) {
                card.style.display = 'block';
                foundProduct = true;
            } else {
                card.style.display = 'none';
            }
        });

        // Tampilkan pesan jika tidak ada produk yang cocok
        let noResultMessage = document.getElementById('no-result-message');
        if (!foundProduct) {
            noResultMessage.style.display = 'block';
        } else {
            noResultMessage.style.display = 'none';
        }
    });
</script>
<?php $this->endSection() // <-- PENTING: Mengakhiri script ?>

