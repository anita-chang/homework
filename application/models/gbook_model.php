<?php
class Gbook_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	function all($pid)
	{
		$query = $this->db->order_by('gid', 'desc')->get_where('gbook', array('pid' => $pid));
		return $query;
	}
	function add($all)
	{
		$this->db->insert('gbook',$all);
	}
}