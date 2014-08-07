<?php
class Gbook_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function g_show($pid)
	{
		$query = $this->db->order_by('gid', 'desc')->get_where('gbook', array('pid' => $pid));
		return $query->result_array();
	}
	public function g_add($all)
	{
		$this->db->insert('gbook',$all);
	}
	public function g_del($gid)
	{
		$this->db->delete('gbook', array('gid' => $gid));
	}
}