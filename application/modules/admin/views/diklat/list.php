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
$form->addInput('photo','thumbnail');
$form->setImage('photo','diklat');
$form->addInput('tmpt_lahir','plaintext');
$form->setLabel('tmpt_lahir','Tempat Lahir');
$form->addInput('accepted','checkbox');
$form->setDelete(True);
$form->setEditLink(base_url('admin/diklat_edit/?id='));
$form->setEdit(TRUE);
?>
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
<div class="box">
	<div class="box-body table-responsive">
		<a href="<?php echo base_url('admin/diklat_list_report?t=excel') ?>" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i></a>
		<a href="<?php echo base_url('admin/diklat_list_report?t=pdf') ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> / <i class="fa fa-file-pdf-o"></i></a>
		<?php $form->form();?>
	</div>
</div>