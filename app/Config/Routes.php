<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. FRONT-END ROUTES (Halaman Publik)
$routes->get('/', 'Home::index');
$routes->get('/tentang-kami', 'Home::tentang');
$routes->get('/layanan', 'Home::layanan');
$routes->get('/produk', 'Home::produk');
$routes->get('/berita', 'Home::berita');
$routes->get('/karir', 'Home::karir');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/tim', 'Home::tim');
$routes->get('/galeri', 'Home::galeri');

// --- Form Kirim (Public) ---
$routes->post('/kontak/kirim', 'Home::kirimPesan');
$routes->post('/karir/submit', 'Home::submitLamaran');

// --- Pesan & Produk ---
$routes->get('/pesan/produk/(:num)', 'Home::formPesan/$1');
$routes->get('/pesan/sukses/(:num)', 'Home::pesanSukses/$1');
$routes->post('/pesan/kirim', 'Home::submitPesan');

// --- Detail Konten ---
$routes->get('/news/detail/(:num)', 'Home::newsDetail/$1');
$routes->get('/pengumuman/detail/(:num)', 'Home::announcementDetail/$1');


// 2. Login & Registrasi ROUTES
$routes->get('admin/login', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login/process', 'Auth::processLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register/process', 'Auth::processRegister');
$routes->get('/logout', 'Auth::logout');


// 3. BACK-END ROUTES
$routes->group('admin', ['filter' => 'auth'], function($routes) {

    // --- Index & Dashboard ---
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index'); 

    // --- Kelola Halaman: Tentang Kami (About) ---
    $routes->get('about', 'Admin\About::index');
    $routes->post('about/updateProfile', 'Admin\About::updateProfile');
    $routes->post('about/storeTeam', 'Admin\About::storeTeam');
    $routes->post('about/updateTeam', 'Admin\About::updateTeam');
    $routes->get('about/deleteTeam/(:num)', 'Admin\About::deleteTeam/$1');
    $routes->post('about/storeMitra', 'Admin\About::storeMitra');
    $routes->get('about/deleteMitra/(:num)', 'Admin\About::deleteMitra/$1');
    
    // --- Kelola Halaman: Layanan (Services) ---
    $routes->get('services', 'Admin\Services::index');
    $routes->post('services/updateStats', 'Admin\Services::updateStats');
    $routes->post('services/storeService', 'Admin\Services::storeService');
    $routes->post('services/updateService', 'Admin\Services::updateService');
    $routes->get('services/deleteService/(:num)', 'Admin\Services::deleteService/$1');

    // --- Kelola Produk ---
    $routes->get('products', 'Admin\Products::index');
    $routes->post('products/store', 'Admin\Products::store');
    $routes->post('products/update', 'Admin\Products::update');
    $routes->get('products/delete/(:num)', 'Admin\Products::delete/$1');

    // --- Kelola Galeri (Gallery) ---
    $routes->get('galeri', 'Admin\Galeri::index');
    $routes->get('galeri/tambah', 'Admin\Galeri::tambah');
    $routes->post('galeri/simpan', 'Admin\Galeri::simpan');
    $routes->get('galeri/hapus/(:num)', 'Admin\Galeri::hapus/$1');

    // --- Kelola Berita & Pengumuman (News) ---
    $routes->get('news', 'Admin\News::index');
    $routes->post('news/storeNews', 'Admin\News::storeNews');
    $routes->post('news/updateNews', 'Admin\News::updateNews');
    $routes->get('news/deleteNews/(:num)', 'Admin\News::deleteNews/$1');
    $routes->post('news/storeAnn', 'Admin\News::storeAnn');
    $routes->get('news/deleteAnn/(:num)', 'Admin\News::deleteAnn/$1');

    // --- Kelola Karir (Career) ---
    $routes->get('career', 'Admin\Career::index');
    $routes->post('career/store', 'Admin\Career::store');
    $routes->post('career/update', 'Admin\Career::update');
    $routes->get('career/delete/(:num)', 'Admin\Career::delete/$1');

    // --- Kelola Pelamar Kerja (Applications) ---
    $routes->get('application', 'Admin\Application::index');
    $routes->post('application/updateStatus', 'Admin\Application::updateStatus');
    $routes->get('application/delete/(:num)', 'Admin\Application::delete/$1');
    
    // --- Kelola Pesan Hubungi Kami (Inbox) ---
    $routes->get('inbox', 'Admin\Inbox::index');
    $routes->get('inbox/detail/(:num)', 'Admin\Inbox::detail/$1');
    $routes->get('inbox/delete/(:num)', 'Admin\Inbox::delete/$1');
    $routes->post('inbox/reply', 'Admin\Inbox::reply');

    // --- Kelola Pesanan Produk (Orders) ---
    $routes->get('orders', 'Home::adminOrders'); 
    $routes->get('orders/detail/(:num)', 'Home::orderDetail/$1');
    $routes->get('orders/delete/(:num)', 'Home::deleteOrder/$1'); 
    $routes->post('orders/update/(:num)', 'Home::updateStatus/$1');
});