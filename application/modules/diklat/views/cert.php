<?php
$user = $this->session->userdata(base_url().'_diklat_logged_in');
if(!empty($user))
{
	?>
	<h2>Certifikat</h2>
	<?php
	echo 'nama : '.$this->session->userdata(base_url().'_diklat_logged_in')['username'];
}else{
	echo "\n";
	msg('you dont have permission to access this site', 'danger');
}