<?php defined('BASEPATH') OR exit('No direct script access allowed');
$id = @intval($_GET['id']);
if(!empty($id))
{
	$peserta = $this->db->get_where('peserta','id = '.$id)->row_array();
	if(!empty($peserta))
	{
		$data['data'] = $peserta;
		?>
		<div class="col-md-4">
			<?php $this->load->view('diklat/cert_add', $data); ?>
		</div>
		<div class="col-md-8">
			<?php $this->load->view('diklat/cert_list'); ?>
		</div>
		<?php
	}else{
		echo msg('peserta yang anda cari tidak diketahui', 'danger');
	}
}else{
	echo msg('peserta yang anda cari tidak diketahui', 'danger');
}