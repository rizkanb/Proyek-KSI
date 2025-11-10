<?php
// app/Views/UserDashboard/index_content.php

$pelanggan = $pelanggan ?? [];
// Asumsi Anda mengirimkan data ringkasan pesanan (jika ada)
$total_pesanan = 0; 
$menunggu_konfirmasi = 0;
?>

<div style="padding: 20px; background-color: #f7f9fc; border-radius: 8px;">
    
    <div style="background-color: #e9f7fe; padding: 15px; border-radius: 6px; border-left: 5px solid #007bff; margin-bottom: 30px;">
        <h3 style="color: #007bff; margin-top: 0; font-size: 1.25rem;">Selamat datang kembali, **<?= esc($pelanggan['nama_lengkap']) ?>**!</h3>
        <p style="color: #333; margin: 0;">Ini adalah ringkasan cepat aktivitas akun Anda.</p>
    </div>

    <div style="background-color: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin-bottom: 30px;">
        <h4 style="color: #343a40; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Informasi Akun Anda:</h4>
        
        <table style="width: 100%; max-width: 400px; line-height: 2.2;">
            <tr>
                <td style="font-weight: 600; color: #555;">Username:</td>
                <td><?= esc($pelanggan['username'] ?? '-') ?></td>
            </tr>
            <tr>
                <td style="font-weight: 600; color: #555;">Email:</td>
                <td><?= esc($pelanggan['email'] ?? 'Belum Diatur') ?></td>
            </tr>
            <tr>
                <td style="font-weight: 600; color: #555;">Telepon:</td>
                <td><?= esc($pelanggan['telepon'] ?? 'Belum Diatur') ?></td>
            </tr>
            <tr>
                <td style="font-weight: 600; color: #555;">Alamat:</td>
                <td><?= esc($pelanggan['alamat'] ?? 'Belum Diatur') ?></td>
            </tr>
        </table>
        
        <a href="<?= route_to('user_profile') ?>" style="display: inline-block; margin-top: 20px; color: #007bff; text-decoration: none; font-weight: 600;">
            <span style="margin-right: 5px;">✏️</span> Perbarui Profil
        </a>
    </div>

    <h4 style="color: #343a40; margin-bottom: 20px;">Status Aktivitas Terkini</h4>
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        
        <div style="flex: 1 1 250px; background-color: #f0f8ff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-left: 4px solid #007bff;">
            <h5 style="color: #007bff; margin-top: 0; font-weight: 500;">Total Pesanan</h5>
            <p style="font-size: 2.5rem; font-weight: bold; color: #333; margin: 5px 0;"><?= esc($total_pesanan) ?></p>
            <small style="color: #6c757d;">Keseluruhan pesanan Anda.</small>
        </div>
        
        <div style="flex: 1 1 250px; background-color: #fff8e1; border-radius: 8px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-left: 4px solid #ffc107;">
            <h5 style="color: #ffc107; margin-top: 0; font-weight: 500;">Menunggu Konfirmasi</h5>
            <p style="font-size: 2.5rem; font-weight: bold; color: #333; margin: 5px 0;"><?= esc($menunggu_konfirmasi) ?></p>
            <small style="color: #6c757d;">Pesanan yang belum disetujui Admin.</small>
        </div>
        
        </div>
</div>