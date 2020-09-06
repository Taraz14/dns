<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']   = 'homepage';

//user
$route['get-question']		   = 'HomePage/getQuestion';
$route['get-hasil']		      = 'HomePage/getHasil';
$route['get-kriteria']        = 'HomePage/getKriteria';
$route['get-spk']             = 'spk';

//history
$route['history']   = 'homepage/history';

//auth
$route['service/sign-in'] 	   = 'Authentication';
$route['service/sign-out'] 	   = 'Authentication/signOut';

//admin
$route['0/dashboard'] = 'admin/Dashboard';

//Kriteria
$route['0/kriteria'] 			   = 'admin/Kriteria';
$route['0/kriteria/create'] 	   = 'admin/Kriteria/create';
$route['0/kriteria/delete'] 	   = 'admin/Kriteria/delete';
$route['0/kriteria/update/(:any)'] = 'admin/Kriteria/update/$1';

//Alternatif
$route['0/alternatif'] 			     = 'admin/Alternatif';
$route['0/alternatif/create'] 	     = 'admin/Alternatif/create';
$route['0/alternatif/delete'] 	     = 'admin/Alternatif/delete';
$route['0/alternatif/update/(:any)'] = 'admin/Alternatif/update/$1';

$route['404_override'] 		   = '';
$route['translate_uri_dashes'] = FALSE;
