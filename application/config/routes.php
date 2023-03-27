<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'login';
$route['work_place'] = 'work_place/load_view';
// $route['work_place1'] = 'work_place/admin1';
$route['register'] = 'register/register';
$route['load_offices'] = 'admin/load_offices';
$route['logout'] = 'login/logout';
$route['d_create'] = 'document/create_view';
$route['log_documents'] = 'document/log_documents_view';
$route['load_document_type'] = 'document/load_document_type';
$route['save_document'] = 'document/save_document';
$route['document_succes/(:any)'] = 'document/document_succes';
$route['search_referral_code'] = 'document/search_referral_code';
$route['recieve_document'] = 'document/recieve_document';
$route['load_office_document'] = 'document/load_office_document';
$route['archive'] = 'archive/index';
$route['over_3days_files'] = 'Notification/Load_files_over_3days'; //joshua
// $route['trace_document/(:any)'] = 'document/trace_document/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['validate'] ['POST'] = 'Login/validate';
