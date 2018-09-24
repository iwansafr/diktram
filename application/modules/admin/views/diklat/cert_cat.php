<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();

$form->init('edit');
$form->setTable('cert');
$form->addInput('title','text');
$form->setFormName('edit_cert');
$form2 = new ecrud();

$form2->init('roll');
$form2->setTable('cert');
$form2->addInput('title','plaintext');
$form2->setFormName('roll_cert');
$form2->setDelete(TRUE);


?>

<div class="col-md-12">
	<div class="col-md-4">
		<?php $form->form();?>
	</div>
	<div class="col-md-8">
		<?php $form2->form();?>
	</div>
</div>

