<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Koperasi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        
        /* PATH GAMBAR BACKGROUND DAN LOGO SUDAH DIPERBAIKI */
        :root {
            /* Pastikan file background.jpg ada di public/img/ */
            --bg-image: url('<?= base_url('img/background.jpg') ?>'); 
            --primary-green: #28a745;
            --primary-blue: #007bff;
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-image) no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.95); /* Sedikit transparan agar background terlihat */
            padding: 40px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            width: 380px; /* Lebar card */
            text-align: center;
        }
        .logo {
            margin-bottom: 25px;
        }
        .logo img {
            width: 100px; /* Ukuran logo */
            height: auto;
        }
        h4 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
        .form-control { 
            margin-bottom: 15px; 
            padding: 12px; 
            width: 100%; 
            box-sizing: border-box; 
            border: 1px solid #ddd; 
            border-radius: 6px; 
            font-size: 1rem;
        }
        .btn-green, .btn-blue { 
            border: none; 
            padding: 12px; 
            width: 100%; 
            cursor: pointer; 
            margin-top: 10px; 
            border-radius: 6px; 
            font-weight: bold; 
            transition: background-color 0.2s;
        }
        .btn-green { 
            background-color: var(--primary-green); 
            color: white; 
        }
        .btn-blue { 
            background-color: var(--primary-blue); 
            color: white; 
        }
        .btn-green:hover { background-color: #1e7e34; }
        .btn-blue:hover { background-color: #0056b3; }

        /* Styling pesan error/sukses */
        .message-box {
            padding: 10px; 
            border-radius: 5px; 
            margin-bottom: 15px;
            font-weight: 600;
        }
        .error { background-color: #e74c3c; color: white; }
        .success { background-color: #2ecc71; color: white; }
        .register-link {
            display: block; 
            margin-top: 15px; 
            font-size: 0.9em;
        }
        .register-link a {
            color: var(--primary-blue);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="<?= base_url('img/logo.png') ?>" alt="Logo Koperasi Polinela">
        </div>
        
        <h4>SIGN IN RECEPTIONIST</h4>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="message-box error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="message-box success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= route_to('login') ?>" method="post">
            <?= csrf_field() ?>
            
            <input type="text" name="username" class="form-control" placeholder="USERNAME" required value="<?= old('username') ?>">
            
            <input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
            
            <button type="submit" class="btn-green">SIGN IN</button>
        </form>
        
        <a href="<?= base_url('/') ?>" style="text-decoration: none;">
            <button class="btn-blue" type="button">BACK TO LANDING PAGE</button>
        </a>
        <div class="register-link">
            Belum punya akun? <a href="<?= route_to('register') ?>">Sign Up di sini</a>
        </div>
    </div>
</body>
</html>