<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new Ecrud();
$form->init('roll');
$form->setTable('diklat');

$form->setView('diklat/peserta');

$form->setWhere('accepted = 1');

$form->setField(array('id','nama'));

$form->addInput('id','plaintext');
$form->addInput('nama','link');
$form->setLink('nama', base_url('diklat/profile'),'id');
$form->addInput('photo','thumbnail');
$form->setImage('photo','diklat');
$form->addInput('tmpt_lahir','plaintext');
$form->setLabel('tmpt_lahir','Tempat Lahir');
?>
<h2>Daftar Calon Peserta</h2>
<?php
$form->search();
$form->form();