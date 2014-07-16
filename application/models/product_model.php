<?php
class Product_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_prds($pid = FALSE)
	{
		if ($pid === FALSE)
		{
			$query = $this->db->get('prds');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('prds', array('pid' => $pid));
		return $query->row_array();
	}
}