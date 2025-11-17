<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <h2>Formulir Tambah Pemesanan Baru</h2>
        <p>Isi detail pelanggan dan produk untuk membuat pemesanan.</p>
        
        <form action="<?= base_url('dashboard/pemesanan/create') ?>" method="post">
            <?= csrf_field() ?>
            <!-- Field Pelanggan -->
            <div style="margin-bottom: 15px;">
                <label for="customer" style="display: block; font-weight: bold;">Pelanggan:</label>
                <select name="customer" id="customer" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="">-- Pilih Pelanggan --</option>
                    <!-- Looping data pelanggan dari Controller di sini -->
                </select>
            </div>
            
            <!-- Field Produk -->
            <div style="margin-bottom: 15px;">
                <label for="product" style="display: block; font-weight: bold;">Produk:</label>
                <select name="product" id="product" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="">-- Pilih Produk --</option>
                    <!-- Looping data produk dari Controller di sini -->
                </select>
            </div>
            
            <!-- Field Jumlah -->
            <div style="margin-bottom: 20px;">
                <label for="quantity" style="display: block; font-weight: bold;">Jumlah Beli:</label>
                <input type="number" name="quantity" id="quantity" min="1" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <button type="submit" class="btn-add">Simpan Pemesanan</button>
        </form>
    </div>
<?= $this->endSection() ?>
