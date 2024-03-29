<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Landing_page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ------------------------
// Route Auth
// ------------------------
$route['login'] = 'Auth/login';
$route['logout'] = 'Auth/logout';


// ------------------------
// Route Registrasi
// ------------------------
// $route['url']        = 'Controller/method'
$route['regUmkm']       = 'Registrasi/regUmkm';
$route['regFreelancer'] = 'Registrasi/regFreelancer';


// ------------------------
// Route Admin
// ------------------------
// base_url()admin/dasbor = Controller Dasbor/Method index()
$route['pengelola/dasbor'] = 'Dasbor/index';
$route['Pengelola/editPengelola/(:num)'] = 'Pengelola/Pemesanan/editSingkat/$1/pengelola';
$route['Pengelola/editFreelancer/(:num)'] = 'Pengelola/Pemesanan/editSingkat/$1/freelancer';
$route['Pengelola/editStatus/(:num)'] = 'Pengelola/Pemesanan/editSingkat/$1/status';


// ------------------------
// Route Freelancer
// ------------------------
$route['freelancer/dasbor'] = 'Dasbor/index';


// ------------------------
// Route UMKM
// ------------------------
$route['umkm'] = 'Dasbor/index';
$route['umkm/dasbor'] = 'Dasbor/index';
$route['umkm/pesan-layanan'] = 'Umkm/Pemesanan/pesanLayanan';
$route['umkm/lihat-pesanan'] = 'Umkm/Pemesanan/lihatPesanan';
$route['umkm/lihat-pesanan/(:num)'] = 'Umkm/Pemesanan/lihatPesanan/$1';
$route['umkm/edit-keterangan-pesanan/(:num)'] = 'Umkm/Pemesanan/editKeteranganPesanan/$1';
$route['umkm/edit-pesanan/(:num)'] = 'Umkm/Pemesanan/editPesanan/$1';
// $route['umkm/pesan/redesign'] = 'Umkm/Pemesanan/redesign';
// $route['umkm/pesan/redesign/kemasan'] = 'Umkm/Pemesanan/redesign/kemasan';
// $route['umkm/pesan/redesign/logo'] = 'Umkm/Pemesanan/redesign/logo';

// ------------------------
// Route landing page
// ------------------------
$route['layanan'] = 'Landing_page/layanan';
$route['tentang'] = 'Landing_page/tentang';
$route['kontak'] = 'Landing_page/kontak';
