<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['view_all'] = "product/view_all";
$route['view_all/(:any)'] = "product/view_all/$1";
$route['create'] = "product/create";
$route['addgbook'] = "product/addgbook";
$route['captcha_img'] = "product/captcha_img";
$route['delete/(:any)'] = "product/delete/$1";
$route['del_gbook/(:any)'] = "product/del_gbook/$1";
$route['update_edit'] = "product/update_edit";
$route['update_get/(:any)'] = "product/update_get/$1";
$route['(:any)'] = "product/view/$1";
$route['default_controller'] = "product";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */