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
$route['default_controller'] = 'HomeController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'HomeController/index';
$route['admin'] = 'HomeController/admin';

$route['admin/categoria'] = 'CategoriaController/index';
$route['admin/categoria/create'] = 'CategoriaController/create';
$route['admin/categoria/edit/(:num)'] = 'CategoriaController/edit/$1';
$route['admin/categoria/details/(:num)'] = 'CategoriaController/details/$1';
$route['admin/categoria/delete/(:num)'] = 'CategoriaController/delete/$1';

$route['admin/produto'] = 'ProdutoController/index';
$route['admin/produto/create'] = 'ProdutoController/create';
$route['admin/produto/edit/(:num)'] = 'ProdutoController/edit/$1';
$route['admin/produto/details/(:num)'] = 'ProdutoController/details/$1';
$route['admin/produto/delete/(:num)'] = 'ProdutoController/delete/$1';
$route['admin/produto/filtrar'] = 'ProdutoController/FiltrarProduto';
$route['produto/filtrar'] = 'ProdutoController/FiltrarProduto';

$route['admin/usuario'] = 'UsuarioController/index';
$route['admin/usuario/create'] = 'UsuarioController/create';
$route['admin/usuario/edit/(:num)'] = 'UsuarioController/edit/$1';
$route['admin/usuario/editpassword/(:num)'] = 'UsuarioController/editpassword/$1';
$route['admin/usuario/details/(:num)'] = 'UsuarioController/details/$1';
$route['admin/usuario/delete/(:num)'] = 'UsuarioController/delete/$1';

$route['admin/entrar'] = 'AuthController/entrar';
$route['admin/sair'] = 'AuthController/sair';
