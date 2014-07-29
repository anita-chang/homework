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
	'gbook' =>array(
			array(
				'field' => 'gname',
				'label' => '*留言人',
				'rules' => 'required'
				),
			array(
				'field' => 'chck',
				'label' => '*驗證碼',
				'rules' => 'required'
				),
			array(
				'field' => 'gcontent',
				'label' => '*留言內容',
				'rules' => 'required'
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