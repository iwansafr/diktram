<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new Ecrud();
$form->init('roll');
$form->setTable('peserta');

$form->setView('admin/diklat_peserta');
$form->join('diklat','ON(diklat.id=peserta.diklat_id)', 'peserta.id,diklat.nama, peserta.username, peserta.password');

$form->search();

$form->setField(array('peserta.id','diklat.nama'));

$form->addInput('id','plaintext');
$form->addInput('nama','plaintext');
$form->addInput('username','plaintext');
$form->addInput('password','plaintext');
$form->setEdit(TRUE);
$form->setEditLink(base_url('admin/diklat_peserta_edit?id='));
$form->setDelete(TRUE);
?>

<div class="box">
	<div class="box-body table-responsive">
		<a href="<?php echo base_url('admin/diklat_generate') ?>"><button class="btn btn-sm btn-default"><i class="fa fa-random"></i> generate password</button></a>
		<!-- <a href="<?php echo base_url('admin/diklat_peserta_excel') ?>"><button class="btn btn-sm btn-default"><i class="fa fa-file-excel-o"></i> excel</button></a> -->
		<a href="<?php echo base_url('admin/diklat_peserta_report?t=excel') ?>" target="_blank"><button class="btn btn-sm btn-default"><i class="fa fa-file-excel-o"></i></button></a>
		<a href="<?php echo base_url('admin/diklat_peserta_report?t=pdf') ?>" target="_blank"><button class="btn btn-sm btn-default"><i class="fa fa-print"></i> / <i class="fa fa-file-pdf-o"></i></button></a>
		<?php $form->form();?>
	</div>
</div>