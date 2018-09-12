<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diklat_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_diklat()
	{
		return $this->db->query('SELECT * FROM diklat')->result_array();
	}
	public function generate_id()
	{
		// $id = $this->
	}
}