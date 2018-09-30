<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();
$form->init('edit');
$form->setTable('peserta_cert');

$form->addInput('peserta_id','hidden');
$form->setValue('peserta_id', $data['id']);
$c_tmp      = $this->db->get_where('cert')->result_array();
$cert_ids    = array();

if(!empty($c_tmp))
{
	foreach ($c_tmp as $key => $value)
	{
		$cert_ids[$value['id']] = $value['title'];
	}
}

$form->addInput('cert_id', 'dropdown');
$form->setLabel('cert_id','Jenis Sertifikat');
$form->setOptions('cert_id',$cert_ids);
$form->addInput('title','text');
$form->addInput('file','file');
$form->setAccept('file','.pdf');
$form->addInput('number','text');
$form->addInput('issued','text');
$form->setType('issued','date');
$form->addInput('place_of_issued','text');
$form->addInput('description','textarea');
$form->setFormName('cert_add');
$form->form();
