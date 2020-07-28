<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login']                         = 'auth';
$route['logout']                        = 'auth/logout';

$route['index']                         = 'index';

$route['jenis-barang']                  = 'index/jenisBarang';
$route['jenis-barang/delete/(:any)']    = 'index/jenisBarang_delete/$1';

$route['form-transaksi']                = 'index/transaksi';
$route['transaksi-masuk']               = 'index/transaksi_masuk';
$route['transaksi-masuk/proses']        = 'index/transaksi_masuk_proses';

$route['history']                       = 'index/history';

$route['barang']                        = 'index/barang';
$route['barang/print']                  = 'index/barang_print';
$route['barang/download']               = 'index/barang_download';
$route['barang/qr/(:any)']              = 'index/barang_qrcodeGenerate/$1';
$route['barang/delete/(:any)']          = 'index/barang_delete/$1';


$route['default_controller']            = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
