<!-- app/Views/about_view.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Koperasi Penjualan</title>
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
        .content-section {
            text-align: left;
            margin-top: 2rem;
        }
        .content-section h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
        }
        .content-section p {
            line-height: 1.6;
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
        <h1>Tentang Koperasi Kami</h1>
        <p class="lead-text">Berdiri sejak tahun 2020, kami berkomitmen untuk menyejahterakan anggota.</p>
        
        <div class="content-section">
            <h2>Visi Kami</h2>
            <p>Menjadi koperasi terdepan yang berlandaskan prinsip-prinsip keadilan, transparansi, dan gotong royong untuk kemajuan bersama.</p>
        </div>

        <div class="content-section">
            <h2>Misi Kami</h2>
            <ul>
                <li>Meningkatkan kualitas hidup anggota melalui pelatihan dan pendampingan.</li>
                <li>Menyediakan produk-produk berkualitas dengan harga yang terjangkau.</li>
                <li>Membangun ekosistem bisnis yang berkelanjutan dan saling menguntungkan.</li>
            </ul>
        </div>

        <a href="<?= base_url('dashboard') ?>" class="back-link">
            Kembali ke Dashboard
        </a>
    </div>

</body>
</html>
