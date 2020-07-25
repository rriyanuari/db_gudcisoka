<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login']                         = 'auth';
$route['logout']                        = 'auth/logout';

$route['jenis-barang']                  = 'index/jenisBarang';
$route['jenis-barang/delete/(:any)']    = 'index/jenisBarang_delete/$1';

$route['form-transaksi']                = 'index/transaksi';
$route['form-transaksi/barangMasuk']    = 'index/transaksi_barangMasuk';

$route['history']                       = 'index/history';

$route['barang']                        = 'barang';
$route['barang/print']                  = 'barang/print';
$route['barang/download']               = 'barang/download';
$route['barang/qr/(:any)']              = 'barang/qrcodeGenerate/$1';
$route['barang/delete/(:any)']          = 'barang/delete/$1';


$route['default_controller']            = 'index/jenisBarang';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
