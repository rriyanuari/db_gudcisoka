<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['jenis-barang']                  = 'jenisBarang';
$route['jenis-barang/delete/(:any)']    = 'jenisBarang/delete/$1';

$route['form-transaksi']                = 'transaksi/formTransaksi';
$route['form-transaksi/delete/(:any)']  = 'transaksi/formTransaksi_delete/$1';

$route['history']                       = 'history';

$route['barang']                        = 'barang';


$route['default_controller']    = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
