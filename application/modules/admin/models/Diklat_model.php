<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diklat_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function diklat_list()
	{
		return $this->db->get('diklat')->result_array();
	}

	public function diklat_peserta()
	{
		return $this->db->query('SELECT p.username,p.password , d.* FROM peserta AS p LEFT JOIN diklat AS d ON(p.diklat_id=d.id)')->result_array();
	}

	public function keterampilan()
	{
		$this->db->select('id,title');
		$data = $this->db->get('keterampilan')->result_array();
		$tmp_data = array();
		if(!empty($data))
		{
			foreach ($data as $key => $value) 
			{
				$tmp_data[$value['id']] = $value['title'];
			}
		}
		return $tmp_data;
	}
}