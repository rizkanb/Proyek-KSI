<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        :root {
            --background-gray: #ececec;
            --dark-gray: #607d8b; /* Latar belakang area konten (sesuai desain) */
            --light-gray: #cfd8dc; /* Warna card */
            --primary-text: #263238;
            --secondary-text: #546e7a;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-gray);
            margin: 0;
            padding: 0;
            color: var(--primary-text);
        }
        /* --- Navbar Styling (Sama dengan Home View) --- */
        .navbar-container {
            background-color: white;
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .navbar-menu, .navbar-auth {
            display: flex;
            gap: 10px;
        }
        .navbar-menu a, .navbar-auth a {
            background-color: #aaa;
            color: white;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
        }
        .navbar-menu a:hover, .navbar-auth a:hover {
            background-color: #888;
        }
        /* --- Header Kontak --- */
        .header-section {
            padding: 10px 0;
            background-color: #dcdcdc; /* Pembatas Kontak */
            text-align: center;
            font-size: 1.2rem;
            font-weight: 600;
        }
        /* --- Konten Utama --- */
        .content-area {
            background-color: var(--dark-gray);
            padding: 50px 20px;
            min-height: 70vh;
        }
        .card-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .card {
            background-color: var(--light-gray);
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 250px;
            padding: 30px 20px;
            text-align: center;
            position: relative;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .card-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .card-button {
            background-color: white; 
            color: var(--primary-text);
            padding: 10px 30px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border: 1px solid #ccc;
        }
        .logo-polinela {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            border: 3px solid var(--dark-gray);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark-gray);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar-container">
        <div class="navbar-menu">
            <a href="<?= base_url('/') ?>">HOME</a>
            <a href="<?= base_url('about') ?>">ABOUT</a>
            <a href="<?= base_url('product') ?>">PRODUK</a>
            <a href="<?= base_url('benefit') ?>">BENEFIT</a>
            <a href="<?= base_url('contact') ?>" style="background-color: #888;">KONTAK</a>
        </div>
        <div class="navbar-auth">
            <!-- Link SIGN IN harus mengarah ke /auth, bukan /auth/login -->
            <a href="<?= base_url('auth') ?>">SIGN IN</a>
            <a href="<?= base_url('register') ?>">SIGN UP</a>
        </div>
    </div>

    <div class="header-section">
        Kontak
    </div>

    <div class="content-area">
        <div class="card-grid">
            
            <!-- Kartu 1: Definisi Kopma -->
            <div class="card">
                <div class="card-content">
                    <span style="font-size: 2.5rem; color: var(--secondary-text);">&#128196;</span>
                </div>
                <a href="#" class="card-button">Definisi Kopma</a>
            </div>

            <!-- Kartu 2: Hub. Kami -->
            <div class="card">
                 <div class="card-content">
                    <span style="font-size: 2.5rem; color: var(--secondary-text);">&#9993;</span>
                </div>
                <a href="#" class="card-button">Hub.Kami</a>
            </div>

            <!-- Kartu 3: Lokasi (dengan Logo Polinela) -->
            <div class="card">
                <div class="logo-polinela">L</div> <!-- Placeholder Logo Polinela -->
                <div class="card-content">
                    <span style="font-size: 2.5rem; color: var(--secondary-text);">&#128205;</span>
                </div>
                <a href="#" class="card-button">Lokasi</a>
            </div>

        </div>
    </div>
</body>
</html>
