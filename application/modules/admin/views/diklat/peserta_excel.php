<?php defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-type: application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=peserta.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);


$data = $this->db->query('SELECT diklat.*, peserta.username,peserta.password FROM diklat LEFT JOIN peserta ON(diklat.id = peserta.diklat_id) WHERE diklat.accepted = 1')->result_array();

if(!empty($data))
{
	$header     = $data[0];
	$kelamin    = array('Perempuan','Laki-laki');
	$pendidikan = array_start_one(array('SD','SLTP','D1','SLTA','D2','D3','D4','S1','S2','S3'));
	$pekerjaan = array(
		'Tidak Bekerja (di rumah saja)',
		'PNS',
		'Guru',
		'Dosen',
		'TNI',
		'POLRI',
		'Dokter',
		'Bidan',
		'Perawat',
		'Pegawai Swasta',
		'Wiraswasta/Pengusaha',
		'Buruh',
		'Sopir',
		'IRT (Ibur Rumah Tangga)'
	);
	$pekerjaan = array_start_one($pekerjaan);
	$jalur = array_start_one(array('Online','Prestasi','Reguler'));
	$j_tmp      = $this->db->get_where('keterampilan')->result_array();
	$jurusan    = array();
	if(!empty($j_tmp))
	{
		foreach ($j_tmp as $key => $value)
		{
			$jurusan[$value['id']] = $value['title'];
		}
	}
	?>
	<table border="1">
		<?php
		foreach ($header as $key => $value)
		{
			if($key == 'photo'){
			}else if($key == 'accepted'){
			}else{
				echo '<th>'.$key.'</th>';
			}
		}
		foreach ($data as $key => $value)
		{
			echo '<tr>';
			$tmp_v = $value;
			foreach ($tmp_v as $tkey => $tvalue)
			{
				if($tkey == 'photo'){
				}else if($tkey == 'accepted'){
				}else{
					if($tkey == 'kelamin')
					{
						$tvalue = $kelamin[$tvalue];
					}else if($tkey == 'pdd_terakhir_ayah' || $tkey == 'pdd_terakhir_ibu')
					{
						$tvalue = $pendidikan[$tvalue];
					}else if($tkey == 'pekerjaan_ayah' || $tkey == 'pekerjaan_ibu')
					{
						$tvalue = $pekerjaan[$tvalue];
					}else if($tkey == 'jalur')
					{
						$tvalue = $jalur[$tvalue];
					}else if($tkey == 'pil_1' || $tkey == 'pil_2')
					{
						$tvalue = $jurusan[$tvalue];
					}
					echo '<td>'.$tvalue.'</td>';
				}
			}
			echo '</tr>';
		}
		?>
	</table>
	<?php
}
