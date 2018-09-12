<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new Ecrud();
$form->init('roll');
$form->setTable('peserta');

$form->setView('admin/diklat_peserta');
$form->join('diklat','ON(diklat.id=peserta.diklat_id)', 'peserta.id,diklat.nama, peserta.username, peserta.password');

$form->search();

$form->setField(array('id','nama'));

$form->addInput('id','plaintext');
$form->addInput('nama','plaintext');
$form->addInput('username','plaintext');
$form->addInput('password','plaintext');
$form->setDelete(TRUE);
?>

<div class="box">
	<div class="box-body table-responsive">
		<a href="<?php echo base_url('admin/diklat_generate') ?>"><button class="btn btn-sm btn-success"><i class="fa fa-random"></i> generate password</button></a>
		<?php $form->form();?>
	</div>
</div>