<?php defined('BASEPATH') OR exit('No direct script access allowed');
// pr($this->input->post());
$form = new Ecrud();
$form->init('roll');
$form->setTable('diklat');

$form->setView('admin/diklat_list');

$form->search();

$form->setField(array('id','nama'));

$form->addInput('id','plaintext');
$form->addInput('nama','plaintext');
$form->addInput('tmpt_lahir','plaintext');
$form->setLabel('tmpt_lahir','Tempat Lahir');
$form->addInput('accepted','link');
$form->setLink('accepted',base_url('admin/diklat_list'), 'id');
$form->setPlainText('accepted','<button class="btn btn-sm btn-primary">terima</button>');
$form->setDelete(True);
?>

<div class="box">
	<div class="box-body table-responsive">
		<?php $form->form();?>
	</div>
</div>