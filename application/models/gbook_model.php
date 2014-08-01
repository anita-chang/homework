<?php
class Gbook_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	function g_show($pid)
	{
		$query = $this->db->order_by('gid', 'desc')->get_where('gbook', array('pid' => $pid));
		return $query->result_array();
	}
	function g_add($all)
	{
		$this->db->insert('gbook',$all);
	}
}