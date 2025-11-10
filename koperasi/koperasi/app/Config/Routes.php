<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use Config\Services;

// =========================================================================
// PENTING: IMPORT SEMUA CONTROLLER YANG DIGUNAKAN DI BAWAH INI
// =========================================================================
use App\Controllers\Auth;
use App\Controllers\Home;
use App\Controllers\About;
use App\Controllers\ProductPublic;
use App\Controllers\Benefit;
use App\Controllers\Contact;
use App\Controllers\UserDashboard; // <-- PASTIKAN DI IMPORT
use App\Controllers\Dashboard;

// Controller Admin
use App\Controllers\Produk;
use App\Controllers\Pelanggan;
use App\Controllers\Pemesanan;
use App\Controllers\Laporan;
use App\Controllers\Setting;
use App\Controllers\Anggota;
use App\Controllers\CliController;


/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// ==============================================
// 1. ROUTE PUBLIK & 2. ROUTE OTENTIKASI
// ==============================================
$routes->get('/', [Home::class, 'index'], ['as' => 'home']);
$routes->get('about', [About::class, 'index'], ['as' => 'about']);
$routes->get('product', [ProductPublic::class, 'index'], ['as' => 'product_public']);
$routes->get('benefit', [Benefit::class, 'index'], ['as' => 'benefit']);
$routes->get('contact', [Contact::class, 'index'], ['as' => 'contact']);
$routes->get('login', [Auth::class, 'index'], ['as' => 'login']);
$routes->post('login', [Auth::class, 'login']);

// PERBAIKAN: Sebaiknya hanya gunakan POST untuk logout demi keamanan
$routes->post('logout', [Auth::class, 'logout'], ['as' => 'logout']);
// $routes->get('logout', [Auth::class, 'logout'], ['as' => 'logout_get']); // <-- Ini sebaiknya dihapus

$routes->get('register', [Auth::class, 'register_form'], ['as' => 'register']);
$routes->post('register/save', [Auth::class, 'save_register'], ['as' => 'save_register']);
$routes->get('auth', function () {
    return redirect()->to(route_to('login'));
});

// ==============================================
// 3. ROUTE USER/PELANGGAN
// ==============================================
// Rute utama /user harus eksplisit di luar group untuk mencegah error 404 index
$routes->get('user', [UserDashboard::class, 'index'], ['as' => 'user_dashboard']);

$routes->group('user', ['filter' => 'authfilter'], static function ($routes) {

    // Rute buy, profile, history didefinisikan di dalam group /user
    // URL: /user/buy
    $routes->get('buy', [UserDashboard::class, 'buy'], ['as' => 'user_buy']);

    // URL: /user/process_order (INI PENTING: Mengarah ke method processOrder di UserDashboard)
    $routes->post('process_order', [UserDashboard::class, 'processOrder'], ['as' => 'user_process_order']);

    // URL: /user/profile
    $routes->get('profile', [UserDashboard::class, 'profile'], ['as' => 'user_profile']);

    // URL: /user/update_profile
    $routes->post('update_profile', [UserDashboard::class, 'updateProfile'], ['as' => 'user_update_profile']);

    // URL: /user/history
    $routes->get('history', [UserDashboard::class, 'history'], ['as' => 'user_history']);
});

// ==============================================
// 4. ROUTE DASHBOARD ADMIN
// ==============================================
$routes->group('dashboard', ['filter' => 'authfilter'], static function ($routes) {

    // --- Dashboard Utama ---
    $routes->get('/', [Dashboard::class, 'index'], ['as' => 'dashboard']);

    // ==================================================
    // RUTE PRODUK (SESUAI CONTROLLER)
    // ==================================================

    // 1. GET /dashboard/produk (Menampilkan daftar)
    $routes->get('produk', [Produk::class, 'index'], ['as' => 'produk_management']);
// ... (sisa rute produk Anda sudah benar) ...
    $routes->post('produk/create', [Produk::class, 'create'], ['as' => 'produk_management_create']);
    $routes->get('produk/edit/(:num)', [Produk::class, 'edit/$1'], ['as' => 'produk_management_edit']);
    $routes->post('produk/update/(:num)', [Produk::class, 'update/$1'], ['as' => 'produk_management_update']);
    $routes->post('produk/delete/(:num)', [Produk::class, 'delete/$1'], ['as' => 'produk_management_delete']);


    // --- PELANGGAN (ROUTE MANUAL) ---
    $routes->get('pelanggan', [Pelanggan::class, 'index'], ['as' => 'pelanggan']);
// ... (sisa rute pelanggan Anda sudah benar) ...
    $routes->post('pelanggan', [Pelanggan::class, 'create']);
    $routes->get('pelanggan/new', [Pelanggan::class, 'new'], ['as' => 'pelanggan_new']);
    $routes->get('pelanggan/edit/(:num)', [Pelanggan::class, 'edit/$1'], ['as' => 'pelanggan_edit']);
    $routes->post('pelanggan/update/(:num)', [Pelanggan::class, 'update/$1'], ['as' => 'pelanggan_update']);
    $routes->post('pelanggan/delete/(:num)', [Pelanggan::class, 'delete/$1'], ['as' => 'pelanggan_delete']);


    // --- PEMESANAN ---
    $routes->get('pemesanan', [Pemesanan::class, 'index'], ['as' => 'pemesanan_list']);
// ... (sisa rute pemesanan Anda sudah benar) ...
    $routes->get('pemesanan/tambah', [Pemesanan::class, 'tambah'], ['as' => 'pemesanan_tambah']);
    $routes->post('pemesanan/simpan', [Pemesanan::class, 'simpan'], ['as' => 'pemesanan_simpan']);
    $routes->get('pemesanan/detail/(:num)', [Pemesanan::class, 'detail/$1'], ['as' => 'pemesanan_detail']);
    $routes->get('pemesanan/hapus/(:num)', [Pemesanan::class, 'hapus/$1'], ['as' => 'pemesanan_hapus']);
    $routes->post('pemesanan/update-status/(:num)', [Pemesanan::class, 'updateStatus/$1'], ['as' => 'pemesanan_update_status']);


    // --- LAPORAN ---
    $routes->get('laporan', [Laporan::class, 'index'], ['as' => 'laporan']);
// ... (sisa rute laporan Anda sudah benar) ...
    $routes->get('laporan/penjualan', [Laporan::class, 'penjualan'], ['as' => 'laporan_penjualan']);

    // --- SETTING ---
    $routes->get('setting', [Setting::class, 'index'], ['as' => 'setting']);
// ... (sisa rute setting Anda sudah benar) ...
    $routes->post('setting/save', [Setting::class, 'save'], ['as' => 'setting_save']);

    // ==================================================
    // RUTE ANGGOTA (SESUAI CONTROLLER)
    // ==================================================
    // 1. GET /dashboard/anggota (Menampilkan daftar)
    $routes->get('anggota', [Anggota::class, 'index'], ['as' => 'anggota_list']);

    // 2. GET /dashboard/anggota/new (Menampilkan form baru)
    // PERBAIKAN: Mengganti typo 'AngGota' menjadi 'Anggota'
    $routes->get('anggota/new', [Anggota::class, 'new'], ['as' => 'anggota_new']);

    // 3. POST /dashboard/anggota/create (Menyimpan data baru)
    $routes->post('anggota/create', [Anggota::class, 'create'], ['as' => 'anggota_create']);
// ... (sisa rute anggota Anda sudah benar) ...
    $routes->get('anggota/edit/(:num)', [Anggota::class, 'edit/$1'], ['as' => 'anggota_edit']);
    $routes->post('anggota/update/(:num)', [Anggota::class, 'update/$1'], ['as' => 'anggota_update']);
    $routes->post('anggota/delete/(:num)', [Anggota::class, 'delete/$1'], ['as' => 'anggota_delete']);
});

// ==============================================
// 5. CLI ROUTE
// ==============================================
$routes->cli('rute_cli_anda', [CliController::class, 'method']);