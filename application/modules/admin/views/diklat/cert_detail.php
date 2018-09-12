<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id = @intval($_GET['id']);
if(!empty($id))
{
	$data = $this->db->get_where('peserta_cert', 'id = '.$id)->row_array();
	if(!empty($data))
	{
		?>
		<h4><?php echo $data['title'] ?></h4>
		<p>
			<iframe src="<?php echo image_module('peserta_cert',$data['id'].DIRECTORY_SEPARATOR.$data['file']) ?>"></iframe>
		</p>
		<p>
			<a href="<?php echo image_module('peserta_cert',$data['id'].DIRECTORY_SEPARATOR.$data['file']) ?>" class="media">download <?php echo $data['file'] ?></a>
		</p>
		<p>
			<?php echo $data['description'] ?>
		</p>
		<?php
	}
}
