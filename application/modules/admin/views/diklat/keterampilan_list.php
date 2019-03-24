<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();
$form->init('roll');
$form->setTable('keterampilan');
$form->addInput('id','plaintext');
$form->addInput('title','plaintext');
$form->setView('admin/diklat_keterampilan');
$form->setDelete(TRUE);
$form->form();