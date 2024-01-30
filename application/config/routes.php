<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']    = 'home';

$route['dashboard']             = 'dashboard';
$route['user']                  = 'user';
$route['seminar']               = 'seminar';

$route['blocked']               = 'auth/blocked';
$route['system_error']          = 'auth/system_error';
$route['not_found']             = 'auth/not_found';
$route['change_password']       = 'auth/change_password';
$route['404_override']          = 'auth/not_found';
$route['translate_uri_dashes']  = FALSE;
