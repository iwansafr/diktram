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
$form->addInput('place_of_issued','plaintext');
$form->setLabel('place_of_issued','Place of Issued');
$form->setDelete(TRUE);
$form->setEdit(TRUE);
$form->setEditLink('?id='.@intval($_GET['id']).'&cert_id=');
$form->setFormName('cert_list');
$form->form();