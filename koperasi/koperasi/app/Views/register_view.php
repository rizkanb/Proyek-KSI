<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Registrasi Akun' ?></title>
    <!-- Font Awesome untuk ikon (opsional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Menggunakan Font Inter */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        
        :root {
            --primary-green: #2ecc71; /* Hijau Cerah */
            --secondary-blue: #3498db; /* Biru Cerah */
            --text-color: #34495e;
            --input-border: #bdc3c7;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            /* Background Gradien Menarik */
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
        }
        .register-container { 
            background: white; 
            padding: 40px; 
            border-radius: 15px; 
            /* Shadow yang halus */
            box-shadow: 0 10px 30px rgba(0,0,0,0.15); 
            width: 380px; 
            text-align: center; 
        }
        h4 { 
            margin-bottom: 30px; 
            color: var(--text-color);
            font-weight: 700;
            border-bottom: 2px solid var(--primary-green);
            display: inline-block;
            padding-bottom: 5px;
        }
        .form-control { 
            margin-bottom: 18px; 
            padding: 12px; 
            width: 100%; 
            box-sizing: border-box; 
            border: 1px solid var(--input-border); 
            border-radius: 8px;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: var(--secondary-blue);
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
        .btn-green { 
            background-color: var(--primary-green); 
            color: white; 
            border: none; 
            padding: 12px; 
            width: 100%; 
            cursor: pointer; 
            margin-top: 15px; 
            border-radius: 8px; 
            font-weight: bold; 
            transition: background-color 0.3s;
        }
        .btn-green:hover { 
            background-color: #27ad60; 
            box-shadow: 0 5px 10px rgba(46, 204, 113, 0.4);
        }
        .error-message { 
            color: #e74c3c; 
            text-align: left; 
            margin-top: -10px; 
            margin-bottom: 10px; 
            font-size: 0.9em; 
        }
        .validation-errors { 
            background-color: #fcebeb; 
            border: 1px solid #e74c3c; 
            padding: 10px; 
            margin-bottom: 15px; 
            border-radius: 8px; 
            text-align: left; 
            color: #c0392b;
        }
        .login-link {
            margin-top: 25px;
            font-size: 0.95em;
            color: var(--text-color);
        }
        .login-link a {
            color: var(--secondary-blue);
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h4>BUAT AKUN BARU</h4>

        <!-- Menampilkan Pesan Error Validasi dari Controller -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="validation-errors">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Perbaikan Action Form: Menggunakan route_to() yang sudah benar -->
        <form action="<?= route_to('save_register') ?>" method="post">
            <?= csrf_field() ?> 
            
            <input type="text" name="nama_lengkap" class="form-control" placeholder="NAMA LENGKAP" value="<?= old('nama_lengkap') ?>" required>
            
            <input type="text" name="username" class="form-control" placeholder="USERNAME" value="<?= old('username') ?>" required>
            
            <input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
            
            <input type="password" name="pass_confirm" class="form-control" placeholder="KONFIRMASI PASSWORD" required>
            
            <button type="submit" class="btn-green"><i class="fas fa-user-plus"></i> BUAT AKUN</button>
        </form>
        
        <p class="login-link">
            Sudah punya akun? <a href="<?= route_to('login') ?>">Login di sini</a>
        </p>
    </div>
</body>
</html>
