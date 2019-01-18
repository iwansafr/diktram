<?php
if(is_admin())
{
	$form = new Ecrud();
	$form->init('param');
	$form->setTable('config');
	$form->setParamName('diklat_tahun');
	$form->addInput('tahun','text');
	$form->setAttribute('tahun',array('type'=>'number'));
	$form->form();
}else{
	echo msg('you don have permission to access this site','danger');
}