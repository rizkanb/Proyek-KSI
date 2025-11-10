<!-- app/Views/benefit_view.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuntungan Anggota | Koperasi Penjualan</title>
    <!-- CSS untuk tampilan modern -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #2ecc71;
            --background-light: #f4f7f9;
            --background-dark: #ecf0f1;
            --card-bg: #ffffff;
            --text-color: #34495e;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-light);
            margin: 0;
            padding: 0;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }
        .lead-text {
            font-size: 1rem;
            color: #7f8c8d;
            margin-bottom: 2rem;
        }
        .benefit-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
            text-align: left;
        }
        .benefit-card {
            background-color: var(--background-dark);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .benefit-card h3 {
            font-size: 1.25rem;
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 0.5rem;
        }
        .benefit-card p {
            font-size: 0.9rem;
            color: var(--text-color);
            margin: 0;
        }
        .back-link {
            display: inline-block;
            margin-top: 2rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .back-link:hover {
            color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Keuntungan Anggota</h1>
        <p class="lead-text">Bergabung menjadi anggota koperasi kami memberikan banyak keuntungan eksklusif.</p>
        
        <div class="benefit-grid">
            <div class="benefit-card">
                <h3>Harga Khusus</h3>
                <p>Dapatkan harga anggota yang lebih murah untuk semua produk.</p>
            </div>
            <div class="benefit-card">
                <h3>Bagi Hasil Tahunan</h3>
                <p>Nikmati pembagian sisa hasil usaha (SHU) setiap tahun.</p>
            </div>
            <div class="benefit-card">
                <h3>Pinjaman Anggota</h3>
                <p>Akses pinjaman modal usaha dengan bunga yang ringan.</p>
            </div>
            <div class="benefit-card">
                <h3>Pelatihan & Seminar</h3>
                <p>Ikut serta dalam pelatihan gratis untuk meningkatkan kompetensi.</p>
            </div>
        </div>

        <a href="<?= base_url('dashboard') ?>" class="back-link">
            Kembali ke Dashboard
        </a>
    </div>

</body>
</html>
