<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();

$id = $this->input->get('id');

if(!empty($id))
{
	$form->setId($id);
	$form->setHeading('Edit Diklat Keterampilan');
}else{
	$form->setHeading('Tambah Diklat Keterampilan');
}
$form->setEditStatus(false);
$form->init('edit');
$form->setTable('keterampilan');
$form->addInput('title','text');
$form->form();