<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h2 class="fw-bold text-dark"><i class="fas fa-users me-2 text-success"></i> <?= esc($title) ?></h2>
        
        <a href="<?= route_to('dashboard'); ?>" class="btn btn-outline-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-3 mb-3 mb-md-0">
                    <a href="#" class="btn btn-success w-100 shadow-sm">
                        <i class="fas fa-user-plus me-1"></i> Tambah Pelanggan
                    </a>
                </div>
                
                <div class="col-md-5 offset-md-4">
                    <form action="<?= route_to('pelanggan') ?>" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Nama/Email..." value="<?= esc($search) ?>">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover bg-white shadow">
        <thead class="table-dark">
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 25%;">Nama Pelanggan</th>
                <th style="width: 20%;">Email</th>
                <th style="width: 25%;">Alamat</th>
                <th style="width: 15%;">Telepon</th>
                <th style="width: 10%;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php if(!empty($pelanggan)): ?>
                <?php foreach($pelanggan as $row): ?>
                <tr>
                    <td class="text-center"><?= $i++ ?></td>
                    <td class="fw-bold"><?= esc($row['nama_pelanggan']); ?></td>
                    <td><?= esc($row['email']); ?></td>
                    <td><?= esc($row['alamat']); ?></td>
                    <td><?= esc($row['telepon']); ?></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center py-4 text-muted"><i class="fas fa-search-minus me-1"></i> Tidak ada data pelanggan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>