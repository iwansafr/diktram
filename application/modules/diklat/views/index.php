
<div class="col-md-2">

</div>
<div class="col-md-8">
	<?php defined('BASEPATH') OR exit('No direct script access allowed');

	$form = new Ecrud();
	$form->init('edit');
	$form->setHeading('Peserta');
	$form->setTable('diklat');
	$form->addInput('nama','text');
	$form->setLabel('nama', 'Nama Lengkap');
	$form->addInput('tmpt_lahir','text');
	$form->setLabel('tmpt_lahir', 'Tempat Lahir');
	$form->addInput('tgl_lahir','text');
	$form->setLabel('tgl_lahir', 'Tanggal Lahir');
	$form->setType('tgl_lahir','date');
	$form->addInput('kelamin','dropdown');
	$form->setLabel('kelamin', 'Jenis Kelamin');
	$form->setOptions('kelamin',array(1=>'Laki-laki',0=>'Perempuan'));
	$form->addInput('alamat', 'textarea');
	$form->setRequired(array('nama','tmpt_lahir','tgl_lahir','kelamin','alamat'));
	$form->form();
	?>
</div>
<div class="col-md-2">

</div>