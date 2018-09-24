<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();
$id = @intval($_GET['id']);
$form->init('roll');
$form->setTable('peserta_cert');
$form->setWhere('peserta_id = '.$id);
$form->addInput('title','link');
$form->setLink('title',base_url('admin/diklat_cert_detail'),'id');
$form->addInput('number','plaintext');
$form->addInput('issued','plaintext');
$form->addInput('expired','plaintext');
$form->setDelete(TRUE);
$form->setFormName('cert_list');
$form->form();