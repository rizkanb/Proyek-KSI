<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <h2>Manajemen Data Pelanggan</h2>
        <p>Melihat daftar pelanggan yang terdaftar melalui registrasi.</p>

        <div style="margin-bottom: 15px;">
            <form action="<?= url_to('pelanggan') ?>" method="GET">
                <input type="text" name="search" placeholder="Cari Nama atau Email..." value="<?= esc($search) ?>" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 300px;">
                <button type="submit" style="padding: 8px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Cari</button>
                <?php if (!empty($search)): ?>
                    <a href="<?= url_to('pelanggan') ?>" style="padding: 8px 15px; margin-left: 5px; background-color: #dc3545; color: white; border: none; border-radius: 4px; text-decoration: none;">Reset</a>
                <?php endif; ?>
            </form>
        </div>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px; text-align: left;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; border: 1px solid #ddd;">Nama Lengkap</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Telepon</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pelanggan)): ?>
                    <tr>
                        <td colspan="4" style="padding: 10px; border: 1px solid #ddd; text-align: center;">Tidak ada data pelanggan.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pelanggan as $item): ?>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?= esc($item['nama_pelanggan']) ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?= esc($item['email']) ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?= esc($item['telepon']) ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;">
                            <a href="<?= url_to('pelanggan_management_edit', $item['id']) ?>" style="color: blue; text-decoration: none;">Edit</a> |
                            <a href="<?= url_to('pelanggan_management_delete', $item['id']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" style="color: red; text-decoration: none;">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>  