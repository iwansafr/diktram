<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();
$form->init('roll');
$form->setTable('keterampilan');
$form->addInput('id','plaintext');
$form->addInput('title','plaintext');
$form->setDelete(TRUE);
$form->form();