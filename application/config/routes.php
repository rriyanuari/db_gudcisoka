<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['jenis-barang']                = 'jenisBarang';
$route['jenis-barang/delete/(:any)']  = 'jenisBarang/delete/$1';

$route['in']                = 'transaksi/in';
$route['in/delete/(:any)']  = 'transaksi/in_delete/$1';

$route['default_controller']    = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
