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

	public function set_prds()
	{
		$this->load->helper('url');
		
		$pid = url_title($this->input->post('pid'), 'dash', TRUE);
		
		$data = array(
			'pname' => $this->input->post('pname'),
			'pinfo' => $this->input->post('pinfo'),
			'pdes' => $this->input->post('pdes'),
			'pprice' => $this->input->post('pprice')
		);
		
		return $this->db->insert('prds', $data);
	}


}