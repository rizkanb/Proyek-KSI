<?php
// Extends layout admin utama Anda.
$this->extend('Admin/layout'); 

// Tentukan judul halaman di sini
$this->section('title');
    echo 'Pengaturan Sistem';
$this->endSection();
?>

<?= $this->section('content') ?>
    <div class="card">
        <h2>Pengaturan Aplikasi</h2>
        <p>Kelola pengaturan umum sistem, seperti nama koperasi, alamat kontak, dan status operasional.</p>
        
        <form action="<?= base_url('dashboard/setting/save') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Setting 1: Nama Koperasi -->
            <div style="margin-bottom: 20px;">
                <label for="app_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Aplikasi / Koperasi:</label>
                <input type="text" name="app_name" id="app_name" value="Koperasi Keren" 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!-- Setting 2: Email Kontak -->
            <div style="margin-bottom: 20px;">
                <label for="contact_email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email Kontak:</label>
                <input type="email" name="contact_email" id="contact_email" value="admin@koperasi.com" 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!-- Setting 3: Mode Operasional -->
            <div style="margin-bottom: 20px;">
                <label for="status" style="display: block; font-weight: bold; margin-bottom: 5px;">Status Sistem:</label>
                <select name="status" id="status" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="1">Aktif (Online)</option>
                    <option value="0">Perawatan (Maintenance)</option>
                </select>
            </div>

            <button type="submit" class="btn-primary" style="padding: 10px 20px; font-size: 1em;">Simpan Perubahan</button>
        </form>
    </div>
<?= $this->endSection() ?>
