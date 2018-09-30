<?php
$q = "ALTER TABLE `menu` ADD `is_local` TINYINT(1) NOT NULL DEFAULT '1' AFTER `link`;";

if($this->db->query($q))
{
	msg('Update Succed', 'success');
}else{
	msg('Update Failed', 'danger');
}
