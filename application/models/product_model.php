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
	/*---總覽-分頁機制---*/
	public function get_prds_page($page = FALSE,$per_page)
	{
		if ($page === FALSE)
		{
			$query = $this->db->get('prds', $per_page);
			return $query->result_array();
		}

		$view = ($page-1) * $per_page;
		$query = $this->db->get('prds', $per_page, $view);
		return $query->result_array();
	}
	/*------新增------*/
	public function set_prds($data)
	{	
		return $this->db->insert('prds', $data);
	}
	/*------刪除------*/
	public function del_prds($pid)
	{
		$this->db->delete('prds', array('pid' => $pid));
	}
	/*------修改------*/
	public function up_prds($data)
	{
		$this->db->update('prds', $data, array('pid' => $data['pid']));
	}

}