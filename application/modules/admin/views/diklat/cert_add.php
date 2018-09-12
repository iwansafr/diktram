<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();
$form->init('edit');
$form->setTable('peserta_cert');

$form->addInput('peserta_id','hidden');
$form->setValue('peserta_id', $data['id']);
$form->addInput('title','text');
$form->addInput('file','file');
$form->setAccept('file','.pdf');
$form->addInput('description','textarea');
$form->setFormName('cert_add');
$form->form();
