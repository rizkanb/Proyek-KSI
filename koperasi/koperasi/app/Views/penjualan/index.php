<!-- ... (Bagian header/layout admin Anda) ... -->

<h2>Daftar Pemesanan Pelanggan</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Produk</th>
            <th>Jurusan</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($listPemesanan)): ?>
            <?php foreach ($listPemesanan as $pesanan): ?>
                <tr>
                    <td><?= esc($pesanan['id']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime(esc($pesanan['created_at']))) ?></td>
                    <td><?= esc($pesanan['nama_lengkap']) ?> (<?= esc($pesanan['username']) ?>)</td>
                    <td><?= esc($pesanan['nama_produk']) ?></td>
                    <td><?= esc($pesanan['jurusan']) ?></td>
                    <td><?= esc($pesanan['jumlah']) ?></td>
                    <td>Rp <?= number_format(esc($pesanan['total_harga']), 0, ',', '.') ?></td>
                    <td><span class="badge bg-<?= ($pesanan['status'] == 'Pending' ? 'warning' : 'success') ?>"><?= esc($pesanan['status']) ?></span></td>
                    <td>
                        <a href="/admin/penjualan/konfirmasi/<?= esc($pesanan['id']) ?>" class="btn btn-sm btn-success">Konfirmasi</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">Tidak ada data pemesanan yang masuk.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- ... (Bagian footer admin Anda) ... -->
