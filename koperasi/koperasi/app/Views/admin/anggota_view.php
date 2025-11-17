<div class="content-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Manajemen Data Anggota</h2>
    <!-- Link Tambah Anggota (saat ini masih placeholder) -->
    <a href="#" style="padding: 10px 20px; background-color: #2ecc71; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s;">+ Tambah Anggota</a>
</div>

<div class="table-container" style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    <table style="width: 100%; border-collapse: separate; border-spacing: 0;">
        <thead>
            <tr style="background-color: #f4f7f9;">
                <th style="padding: 15px; text-align: left; border-bottom: 2px solid #ddd; border-top-left-radius: 8px;">ID Pengguna</th>
                <th style="padding: 15px; text-align: left; border-bottom: 2px solid #ddd;">Nama Lengkap</th>
                <th style="padding: 15px; text-align: left; border-bottom: 2px solid #ddd;">Username</th>
                <th style="padding: 15px; text-align: left; border-bottom: 2px solid #ddd;">Status</th>
                <th style="padding: 15px; text-align: center; border-bottom: 2px solid #ddd; border-top-right-radius: 8px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Cek apakah variabel $anggota ada dan tidak kosong (dikirim dari Controller Anggota.php)
            if (isset($anggota) && count($anggota) > 0) : 
                foreach ($anggota as $row) :
            ?>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 10px;"><?= esc($row['id_pengguna']) ?></td>
                    <td style="padding: 10px;"><?= esc($row['nama']) ?></td>
                    <td style="padding: 10px;"><?= esc($row['username']) ?></td>
                    <td style="padding: 10px;"><?= esc($row['status'] == 1 ? 'Aktif' : 'Tidak Aktif') ?></td>
                    <td style="padding: 10px; text-align: center;">
                        <a href="#" style="color: #3498db; margin-right: 10px;">Edit</a>
                        <a href="#" style="color: #e74c3c;">Hapus</a>
                    </td>
                </tr>
            <?php 
                endforeach;
            else : 
            ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 30px; color: #7f8c8d; font-style: italic;">
                        <p>Data Anggota Kosong. Silakan tambahkan Anggota baru.</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
