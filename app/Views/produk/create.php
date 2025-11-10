<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="mb-4"><?= esc($title) ?></h1>

    <form action="<?= base_url('produk/store') ?>" method="post" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <select name="jurusan" class="form-select" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="Peternakan">Peternakan</option>
                <option value="Ekonomi Bisnis">Ekonomi Bisnis</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                <option value="Budidaya Tanaman Pangan">Budidaya Tanaman Pangan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('produk') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
