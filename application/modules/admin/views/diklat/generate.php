<?php defined('BASEPATH') OR exit('No direct script access allowed');

$q    = 'SELECT id,kode FROM diklat WHERE accepted = ? ORDER BY id DESC';
$data = $this->db->query($q, array(1))->result_array();
$this->db->select('diklat_id');
$peserta = $this->db->get_where('peserta')->result_array();
$ids = array();
if(!empty($peserta))
{
	foreach ($peserta as $key => $value)
	{
		$ids [] = $value['diklat_id'];
	}
}
if(!empty($data))
{
	$q     = 'INSERT INTO peserta (diklat_id,username,password) VALUES ';
	$xq    = array();
	$print = array();

	foreach ($data as $key => $value)
	{
		if(!in_array($value['id'], $ids))
		{
			$ps   = encrypt($value['kode']);
			$ps   = substr($ps,54,60);
			$id   = $value['id'];
			$kode = $value['kode'];
			$xq[] = "($id,'$kode', '$ps')";
			$print[] = array('username'=>$value['kode'],'password'=>$ps);
		}
	}
	if(!empty($xq))
	{
		$xq = implode($xq,',');
		$q .= $xq;
		$q = $q.';';
		if($this->db->query($q))
		{
			foreach ($print as $key => $value)
			{
				echo msg('generate berhasil <h5>username : '.$value['username'].'</h5><h5>password : '.$value['password'].'</h5>','success');
			}
		}
	}else{
		echo msg('tidak ada peserta baru untuk digenerate','warning');
	}
}