<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard Admin Koperasi">
    <meta name="author" content="Gemini">

    <!-- Gunakan $title dari Controller, atau 'Dashboard' sebagai default -->
    <title><?= esc($title ?? 'Admin Koperasi') ?></title>

    <!-- [PERBAIKAN CDN] Menggunakan Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" xintegrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- [PERBAIKAN CDN] Menggunakan SB Admin 2 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" xintegrity="sha512-Nb/NBsXMLvUiSMPadSRUvS+E2QY2S/m4/tB/tMvsq5H1x18zKjEw2I+s/yLgG0twE2/AUG5bXJBvt/D3e1K3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- [PERBAIKAN CDN] CSS untuk DataTables (jika diperlukan) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KOPERASI ADMIN</div>
            </a>

            <!-- 
                [PERBAIKAN]
                Menu Dashboard (Nav Item - Dashboard) telah dihapus dari sidebar
                sesuai permintaan Anda.
            -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Data
            </div>

            <!-- Nav Item - Pemesanan -->
            <!-- Logika 'active' akan menandai menu ini saat URL adalah 'dashboard/pemesanan' -->
            <li class="nav-item <?= (service('uri')->getSegment(2) == 'pemesanan') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard/pemesanan') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Pemesanan</span></a>
            </li>

            <!-- Nav Item - Produk -->
            <li class="nav-item <?= (service('uri')->getSegment(2) == 'produk') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard/produk') ?>">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Nav Item - Anggota -->
            <li class="nav-item <?= (service('uri')->getSegment(2) == 'anggota') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard/anggota') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Anggota</span></a>
            </li>

            <!-- Nav Item - Pelanggan -->
            <li class="nav-item <?= (service('uri')->getSegment(2) == 'pelanggan') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard/pelanggan') ?>">
                    <i class="fas fa-fw fa-user-tag"></i>
                    <span>Pelanggan</span></a>
            </li>

            <!-- Nav Item - Laporan -->
            <li class="nav-item <?= (service('uri')->getSegment(2) == 'laporan') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('dashboard/laporan') ?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= esc(session()->get('nama_lengkap') ?? 'Admin Koperasi') ?></span>
                                <!-- Placeholder Image -->
                                <img class="img-profile rounded-circle"
                                    src="https://via.placeholder.com/60/4E73DF/FFFFFF?text=<?= substr(esc(session()->get('nama_lengkap') ?? 'AD'), 0, 2) ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Konten dinamis dari view (misal: index.php, tambah.php) akan dirender di sini -->
                <?= $this->renderSection('content') ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Koperasi App 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <!-- Form Logout -->
                    <form action="<?= base_url('logout') ?>" method="POST">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- [PERBAIKAN CDN] Menggunakan jQuery dan Bootstrap Bundle CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" xintegrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" xintegrity="sha512-wV7Yj1alIZDqZFCUQJy85S+Ph2TJVTCrL8xotSlVzAwdMeYyXJ1yCC9sI+ME29S+L/aOFbE97JbA7tVjSS/YTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- [PERBAIKAN CDN] Menggunakan jQuery Easing CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" xintegrity="sha512-0QbKAEE8iycpEoeNPYSLuGcvKM6G8R6MDPDlT/V28iLwINtfSME0GZBCp2e/yG3oKJUCEsUPBpJN/deVWLvYvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- [PERBAIKAN CDN] Menggunakan SB Admin 2 JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js" xintegrity="sha512-IeY0B2Ie/tSCV+LnLh/OBcOBAZ9rmNlTDEqTwQRwl7sFyu+52eQh8N3Q11uSQJALc2QNFfFkIeLZvcrfR3CNAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- [PERBAIKAN CDN] Script DataTables (jika diperlukan) -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    <!-- Bagian untuk script tambahan per halaman (misal: script DataTables) -->
    <?= $this->renderSection('page_scripts') ?>

</body>

</html>

