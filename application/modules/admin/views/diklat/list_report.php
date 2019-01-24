<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(@$_GET['t']=='excel')
{
	header("Content-Type: application/vnd.ms-excel; charset=utf-8");
	header("Content-type: application/x-msexcel; charset=utf-8");
	header("Content-Disposition: attachment; filename=calon peserta.xls");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
}
$jalur = array(1=>'online',2=>'prestasi',3=>'reguler');
$acc = array('Belum Diterima', 'Diterima');
$kelamin = array(1=>'Laki-Laki', 2=>'Perempuan');
$style = @$_GET['t'] == 'excel' ? 'border="1"' : 'class="table table-bordered"';
if(@$_GET['t'] != 'excel')
{
	?>
	<link rel="stylesheet" href="<?php echo base_url() ?>templates/admin_lte/bootstrap/css/bootstrap.min.css">
	<?php
}
?>

<table>
	<tr>
		<td colspan="12" align="center"><h1 style="text-align: center;">Data Calon Peserta Diktram</h1></td>
	</tr>
</table>
<table <?php echo $style; ?>>
	<tr>
		<td>ID</td>
		<td>KODE</td>
		<td>NAMA</td>
		<td>EMAIL</td>
		<td>TGL LAHIR</td>
		<td>TMPT LAHIR</td>
		<td>KELAMIN</td>
		<td>ASAL SEKOLAH</td>
		<td>ALAMAT</td>
		<td>keterampilan</td>
		<td>JALUR</td>
		<td>STATUS</td>
	</tr>
	<?php if (!empty($data)): ?>
		<?php foreach ($data as $key => $value): ?>
			<tr>
				<td><?php echo $value['id'] ?></td>
				<td><?php echo $value['kode'] ?></td>
				<td><?php echo $value['nama'] ?></td>
				<td><?php echo $value['email'] ?></td>
				<td><?php echo $value['tgl_lahir'] ?></td>
				<td><?php echo $value['tmpt_lahir'] ?></td>
				<td><?php echo $kelamin[$value['kelamin']] ?></td>
				<td><?php echo $value['asal_sekolah'] ?></td>
				<td><?php echo $value['alamat'] ?></td>
				<td><?php echo $keterampilan[$value['pil_1']] ?></td>
				<td><?php echo $jalur[$value['jalur']] ?></td>
				<td><?php echo $acc[$value['accepted']] ?></td>
			</tr>
		<?php endforeach ?>
	<?php endif ?>
</table>
<?php 
if(@$_GET['t'] == 'pdf')
{
	?>
	<script type="text/javascript">
		window.print();
	</script>
	<?php
}
?>