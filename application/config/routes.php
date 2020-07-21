<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login']                         = 'auth';
$route['logout']                        = 'auth/logout';

$route['jenis-barang']                  = 'jenisBarang';
$route['jenis-barang/delete/(:any)']    = 'jenisBarang/delete/$1';

$route['form-transaksi']                = 'transaksi';
$route['form-transaksi/barangMasuk']    = 'transaksi/barangMasuk';

$route['history']                       = 'history';

$route['barang']                        = 'barang';
$route['barang/print']                  = 'barang/print';
$route['barang/download']               = 'barang/download';
$route['barang/qr/(:any)']              = 'barang/qrcodeGenerate/$1';
$route['barang/delete/(:any)']          = 'barang/delete/$1';


$route['default_controller']            = 'jenisBarang';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
