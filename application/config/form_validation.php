<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
	'normal' =>array(
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
		),
	'img' =>array(
		array(
			'field' => 'pname',
			'label' => '*產品名稱',
			'rules' => 'required'
			),
		array(
			'field' => 'pprice',
			'label' => '*產品價格',
			'rules' => 'required|integer'
			),
		array(
			'field' => 'pimg',
			'label' => '*產品圖片',
			'rules' => 'required'
			)
		)
	);