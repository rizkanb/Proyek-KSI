<?= $this->extend('Admin/layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <h2>Laporan Penjualan (Bulan Ini)</h2>
        <div style="margin-bottom: 20px;">
            <p><strong>Total Penjualan:</strong> Rp. 10.500.000</p>
            <p><strong>Jumlah Transaksi:</strong> 250</p>
        </div>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; border: 1px solid #ddd;">Tanggal</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Jumlah Transaksi</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh Data -->
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">2024-10-01</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">15</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Rp. 500.000</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">2024-10-02</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">10</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Rp. 350.000</td>
                </tr>
                <!-- Akhir Contoh Data -->
            </tbody>
        </table>
        
        <div style="margin-top: 20px; text-align: right;">
            <button onclick="window.print()" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Cetak Laporan</button>
        </div>
    </div>
<?= $this->endSection() ?>
