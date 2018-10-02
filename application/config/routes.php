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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login/home';
$route['login/logging'] = 'login/home/logging';
$route['login/logout'] = 'login/home/logout';

$route['pages'] = 'pages/home';
$route['pages/add'] = 'pages/home/add';
$route['pages/edit/?(:num)?'] = 'pages/home/edit/$1';
$route['pages/remove/(:num)'] = 'pages/home/remove/$1';

$route['posts'] = 'posts/home';
$route['posts/add'] = 'posts/home/add';
$route['posts/edit/?(:num)?'] = 'posts/home/edit/$1';
$route['posts/remove/(:num)'] = 'posts/home/remove/$1';

$route['categories'] = 'categories/home';
$route['categories/add'] = 'categories/home/add';
$route['categories/edit/?(:num)?'] = 'categories/home/edit/$1';
$route['categories/remove/(:num)'] = 'categories/home/remove/$1';

$route['users'] = 'users/home';
$route['users/add'] = 'users/home/add';
$route['users/edit/?(:num)?'] = 'users/home/edit/$1';
$route['users/remove/(:num)'] = 'users/home/remove/$1';

$route['users_groups'] = 'users_groups/home';
$route['users_groups/add'] = 'users_groups/home/add';
$route['users_groups/edit/?(:num)?'] = 'users_groups/home/edit/$1';
$route['users_groups/remove/(:num)'] = 'users_groups/home/remove/$1';

$route['media'] = 'media/home';
$route['media/add'] = 'media/home/add';
$route['media/remove/(:num)'] = 'media/home/remove/$1';

$route['categories_ads'] = 'categories_ads/home';
$route['categories_ads/add'] = 'categories_ads/home/add';
$route['categories_ads/edit/?(:num)?'] = 'categories_ads/home/edit/$1';
$route['categories_ads/remove/(:num)'] = 'categories_ads/home/remove/$1';
