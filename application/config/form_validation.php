<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
		array(
			'field' => 'pname',
			'label' => '*產品名稱',
			'rules' => 'required'
			),
		array(
			'field' => 'pprice',
			'label' => '*產品價格',
			'rules' => 'required|integer'
			)
	);