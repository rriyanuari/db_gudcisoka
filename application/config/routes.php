<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// AUTH
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';

// JENIS BARANG
$route['jenis-barang'] = 'index/jenisBarang';
$route['jenis-barang/print'] = 'index/jenisBarang_print';
$route['jenis-barang/download'] = 'index/jenisBarang_download';
$route['jenis-barang/create'] = 'index/jenisBarang_create';
$route['jenis-barang/delete/(:any)'] = 'index/jenisBarang_delete/$1';

// HISTORY
$route['history'] = 'index/history';
$route['history/print'] = 'index/history_print';
$route['history/download'] = 'index/history_download';

// BARANG
$route['barang'] = 'index/barang';
$route['barang/print'] = 'index/barang_print';
$route['barang/download'] = 'index/barang_download';
$route['barang/qr/(:any)'] = 'index/barang_qrcodeGenerate/$1';
$route['barang/delete/(:any)'] = 'index/barang_delete/$1';

// FORM TRANSAKSI
$route['form-transaksi'] = 'index/transaksi';

  // TRANSAKSI MASUK 
  $route['transaksi-masuk'] = 'index/transaksi_masuk';
  $route['transaksi-masuk/proses'] = 'index/transaksi_masuk_proses';

  // TRANSAKSI KELUAR
  $route['transaksi-keluar'] = 'index/transaksi_keluar';
  $route['transaksi-keluar/scan'] = 'index/transaksi_keluar_scan';
  $route['transaksi-keluar/scan-get-barang'] = 'index/transaksi_keluar_scan2';
  $route['transaksi-keluar/proses/(:any)'] = 'index/transaksi_keluar_proses/$1';
  $route['transaksi-keluar/proses/execute/(:any)'] = 'index/transaksi_keluar_proses_execute/$1';
