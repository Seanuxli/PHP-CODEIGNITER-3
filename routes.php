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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Reg_Log_Control';
$route['Register'] = 'Reg_Log_Control/Register_Page';
$route['Verification'] = 'Reg_Log_Control/Verif_Form';
$route['Login'] = 'Reg_Log_Control/Login_Page';

$route['Admin'] = 'Admin_Control/Admin_Page';
$route['Account'] = 'Admin_Control/Accounts';
$route['Report'] = 'Admin_Control/Reports';
$route['Released_Shirt'] = 'Admin_Control/Released_Shirt';
$route['Released_Hoodie'] = 'Admin_Control/Released_Hoodie';
$route['Released_Patches'] = 'Admin_Control/Released_Patch';
$route['Unreleased_Shirt'] = 'Admin_Control/Unreleased_Shirt';
$route['Unreleased_Hoodie'] = 'Admin_Control/Unreleased_Hoodie';
$route['Unreleased_Patches'] = 'Admin_Control/Unreleased_Patch';
$route['Product_Manage'] = 'Admin_Control/Products';
$route['Stats_Menu'] = 'Admin_Control/Stats';

$route['Apparel'] = 'Homepage_Control/Apparel_Page';
$route['Home'] = 'Homepage_Control/Homepage';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
