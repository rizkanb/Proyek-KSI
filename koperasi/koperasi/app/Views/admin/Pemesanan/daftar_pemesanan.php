<?= $this->extend('template/admin_layout') ?> 
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="mt-4"><?= esc($title) ?></h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Data Semua Pemesanan (<?= $pager->getTotal() ?> total)
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>User Pemesan</th>
                            <th>Produk</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th style="width: 200px;">Ubah Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pemesanan)): ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data pemesanan yang masuk saat ini.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($pemesanan as $pesanan): ?>
                                <tr>
                                    <td><?= esc($pesanan['id']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($pesanan['created_at'])) ?></td>
                                    {{-- Menggunakan alias dari join --}}
                                    <td><?= esc($pesanan['user_name'] ?? 'N/A') ?></td> 
                                    <td><?= esc($pesanan['produk_name'] ?? 'N/A') ?></td>
                                    <td>Rp. <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></td>
                                    <td>
                                        <?php
                                            $badge_class = match($pesanan['status']) {
                                                'Pending' => 'bg-warning',
                                                'Proses' => 'bg-info',
                                                'Selesai' => 'bg-success',
                                                'Batal' => 'bg-danger',
                                                default => 'bg-secondary',
                                            };
                                        ?>
                                        <span class="badge text-white <?= $badge_class ?>"><?= esc($pesanan['status']) ?></span>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('admin/pemesanan/update/' . $pesanan['id']) ?>" method="POST" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="POST">
                                            <select name="status" class="form-control form-control-sm d-inline" onchange="this.form.submit()">
                                                <option value="Pending" <?= $pesanan['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="Proses" <?= $pesanan['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
                                                <option value="Selesai" <?= $pesanan['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                                <option value="Batal" <?= $pesanan['status'] == 'Batal' ? 'selected' : '' ?>>Batalkan</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <?= $pager->links() ?>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>