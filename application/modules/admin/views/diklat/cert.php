<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new Ecrud();
$form->init('roll');
$form->setTable('peserta');

$form->setView('admin/diklat_cert');
$form->join('diklat','ON(diklat.id=peserta.diklat_id)', 'peserta.id,diklat.nama, peserta.username, peserta.password,peserta.created');

$form->search();

$form->setField(array('id','nama'));

$form->addInput('id','plaintext');
$form->addInput('nama','plaintext');
$form->addInput('username','plaintext');
$form->addInput('created','link');
$form->setLabel('created','tambah sertifikat');
$form->setLink('created',base_url('admin/diklat_cert_edit'),'id');
$form->setPlainText('created','<i class="fa fa-plus"> tambah sertificate</i>');
?>

<div class="box">
	<div class="box-body table-responsive">
		<?php $form->form();?>
	</div>
</div>