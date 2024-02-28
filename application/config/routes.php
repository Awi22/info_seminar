<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']        = 'home';

$route['dashboard']                 = 'dashboard';

$route['user']                      = 'user';

//* Menu Master Ruangan
$route['ruangan']                   = 'ruangan';
$route['ruangan/get']               = 'ruangan/get';
$route['ruangan/simpan']            = "ruangan/simpan";
$route['ruangan/get_ruangan_by_id'] = "ruangan/get_ruangan_by_id";
$route['ruangan/update']            = "ruangan/update";
$route['ruangan/hapus']             = "ruangan/hapus";

//* Menu Data Seminar
$route['seminar']                   = 'seminar';
$route['seminar/get']               = 'seminar/get';
$route['seminar/select2_ruangan']   = 'seminar/select2_ruangan';
$route['seminar/simpan']            = "seminar/simpan";
$route['seminar/get_seminar_by_id'] = "seminar/get_seminar_by_id";
$route['seminar/update']            = "seminar/update";
$route['seminar/hapus']             = "seminar/hapus";

$route['blocked']                   = 'auth/blocked';
$route['system_error']              = 'auth/system_error';
$route['not_found']                 = 'auth/not_found';
$route['change_password']           = 'auth/change_password';
$route['404_override']              = 'auth/not_found';
$route['translate_uri_dashes']      = FALSE;
