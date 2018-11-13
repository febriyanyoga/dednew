<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// admin pindah halaman
$route['Admin'] 		= 'AdminC';
$route['Read/(:num)'] 	= 'AdminC/read/$1';
$route['Masterdata'] 	= 'AdminC/masterdata';
$route['Note']			= 'AdminC/skpa_note';	
$route['User_data']		= 'AdminC/user_data';
$route['Dashboard']		= 'AdminC/dashboard';

$route['skpa_note/(:num)']	= 'AdminC/skpanote/$1';
$route['Organisasi/(:num)']	= 'AdminC/organisasi/$1';
$route['SubOrganisasi/(:num)']	= 'AdminC/sub_organisasi/$1';
$route['ObyekData/(:num)']	= 'AdminC/obyek_data/$1';
$route['Parameter/(:num)']	= 'AdminC/parameter/$1';


// skpa event
$route['post_skpa']		= 'AdminC/post_skpa';
$route['update_skpa']	= 'AdminC/post_update_skpa';
$route['post_dokumen']	= 'AdminC/post_dokumen_skpa';
$route['hapus_skpa/(:num)'] 	= 'AdminC/hapus_skpa/$1';
$route['hapus_dokumen/(:num)'] 	= 'AdminC/delete_dokumen_skpa/$1';

$route['post_organisasi']		= 'AdminC/post_organisasi';
$route['post_update_organisasi'] = 'AdminC/post_update_organisasi';
$route['hapus_org/(:num)'] 		= 'AdminC/hapus_organisasi/$1';

$route['post_sub_organisasi'] 	= 'AdminC/post_sub_organisasi';
$route['update_suborganisasi']	= 'AdminC/post_update_sub_organisasi';
$route['hapus_suborg/(:num)'] 		= 'AdminC/hapus_suborganisasi/$1';

$route['post_objek'] = 'AdminC/post_objek_data';
$route['update_objek'] = 'AdminC/post_update_objek_data';
$route['hapus_obj/(:num)'] = 'AdminC/hapus_objek_data/$1';

$route['post_parameter'] = 'AdminC/post_parameter';
$route['update_parameter'] = 'AdminC/post_update_parameter';
$route['hapus_par/(:num)'] = 'AdminC/hapus_parameter/$1';

$route['hapus_note/(:num)'] = 'AdminC/hapus_note/$1';
$route['post_ubah_note'] = 'AdminC/post_ubah_note';
$route['post_note'] = 'AdminC/post_note';

$route['post_user'] = 'AdminC/post_user';
$route['update_user'] = 'AdminC/post_update_user';
$route['hapus_usr/(:num)'] = 'AdminC/hapus_user/$1';




// user
$route['User'] 	= "UserC";
