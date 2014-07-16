<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['view_all'] = "product/view_all";
$route['create'] = "product/create";
//$route['product/view/(:any)'] = "product/view/$1";
$route['(:any)'] = "product/view/$1";
$route['default_controller'] = "product";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */