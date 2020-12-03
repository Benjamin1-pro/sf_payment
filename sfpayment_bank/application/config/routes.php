<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(:any)'] = 'page/view/$1';
$route['default_controller'] = 'page/view';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
