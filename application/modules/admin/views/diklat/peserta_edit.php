<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id = @intval($this->input->get('id'));
if(!empty($id))
{
	$form = new ecrud();
	$form->setId($id);
	$form->init('edit');
	$form->setTable('peserta');
	$form->setHeading('Peserta Account');
	$form->setEditStatus(false);
	$diklat_id = $this->db->query('SELECT diklat_id FROM peserta WHERE id = ? LIMIT 1', array($id))->row_array();
	$diklat_id = $diklat_id['diklat_id'];
	$nama = $this->db->query('SELECT nama FROM diklat WHERE id = ? LIMIT 1', array($diklat_id))->row_array();
	$form->addInput('username', 'text');
	$form->addInput('password', 'text');
	$form->setEncrypt(FALSE);
	$form->setFormName('peserta_form');
	$form->form();

	$form = new Ecrud();

	$form->setId($diklat_id);
	$form->init('edit');
	$form->setHeading('Peserta Detail');
	$form->setTable('diklat');
	$form->setEditStatus(false);
	$form->addInput('jalur', 'dropdown');
	$form->setLabel('jalur',strtoupper('jalur pendaftaran'));
	$form->setOptions('jalur',array_start_one(array('Online','Prestasi','Reguler')));

	$form->addInput('nama','text');
	$form->setLabel('nama', 'Nama Lengkap');

	// $form->addInput('nisn','text');
	// $form->setLabel('nisn','NISN');
	$form->addInput('email','text');
	$form->setType('email','email');
	$form->addInput('tmpt_lahir','text');
	$form->setLabel('tmpt_lahir', 'Tempat Lahir');
	$form->addInput('tgl_lahir','text');
	$form->setLabel('tgl_lahir', 'Tanggal Lahir');
	$form->setValue('tgl_lahir', '2000-01-01');
	$form->setType('tgl_lahir','date');
	$form->addInput('kelamin','dropdown');
	$form->setLabel('kelamin', 'Jenis Kelamin');
	$form->setOptions('kelamin',array_start_one(array('Laki-laki', 'Prempuan')));
	// $form->addInput('anak_ke','dropdown');
	// $form->setLabel('anak_ke','Anak Ke');
	// $form->setOptions('anak_ke', array_start_one(array('1','2','3','4','5','7','8','9','10')));
	// $form->addInput('jml_saudara','dropdown');
	// $form->setLabel('jml_saudara','Jumlah Saudara');
	// $form->setOptions('jml_saudara', array_start_one(array('1','2','3','4','5','7','8','9','10')));

	$form->addInput('asal_sekolah','text');
	$form->setLabel('asal_sekolah', 'Asal Sekolah');

	$form->addInput('alamat_sekolah','textarea');
	$form->setLabel('alamat_sekolah', 'Alamat Sekolah Asal');
	$form->startCollapse('nama', 'Data Calon Siswa');
	$form->endCollapse('alamat_sekolah');


	$pendidikan = array('SD','SLTP','D1','SLTA','D2','D3','D4','S1','S2','S3');
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

	// $form->addInput('nama_ayah','text');
	// $form->setLabel('nama_ayah','Nama Ayah');

	// $form->addInput('tmpt_lahir_ayah','text');
	// $form->setLabel('tmpt_lahir_ayah', 'Tempat Lahir Ayah');

	// $form->addInput('tgl_lahir_ayah','text');
	// $form->setType('tgl_lahir_ayah','date');
	// $form->setValue('tgl_lahir_ayah', '1990-01-01');
	// $form->setLabel('tgl_lahir_ayah', 'Tanggal Lahir Ayah');

	// $form->addInput('pdd_terakhir_ayah','dropdown');
	// $form->setLabel('pdd_terakhir_ayah','Pendidikan Terakhir Ayah');
	// $form->setOptions('pdd_terakhir_ayah',array_start_one($pendidikan));
	// $form->addInput('pekerjaan_ayah','dropdown');
	// $form->setLabel('pekerjaan_ayah','Pekerjaan Ayah');
	// $form->setOptions('pekerjaan_ayah',array_start_one($pekerjaan));

	// $form->addInput('hp_ayah', 'text');
	// $form->setType('hp_ayah','number');
	// $form->setLabel('hp_ayah','No Hp Ayah');
	// $form->startCollapse('nama_ayah', 'Data Orang Tua - Ayah');
	// $form->endCollapse('hp_ayah');

	// $form->addInput('nama_ibu','text');
	// $form->setLabel('nama_ibu','Nama Ibu');

	// $form->addInput('tmpt_lahir_ibu','text');
	// $form->setLabel('tmpt_lahir_ibu', 'Tempat Lahir Ibu');

	// $form->addInput('tgl_lahir_ibu','text');
	// $form->setType('tgl_lahir_ibu','date');
	// $form->setValue('tgl_lahir_ibu', '1990-01-01');
	// $form->setLabel('tgl_lahir_ibu', 'Tanggal Lahir Ibu');

	// $form->addInput('pdd_terakhir_ibu','dropdown');
	// $form->setLabel('pdd_terakhir_ibu','Pendidikan Terakhir Ibu');
	// $form->setOptions('pdd_terakhir_ibu',array_start_one($pendidikan));
	// $form->addInput('pekerjaan_ibu','dropdown');
	// $form->setLabel('pekerjaan_ibu','Pekerjaan Ibu');
	// $form->setOptions('pekerjaan_ibu',array_start_one($pekerjaan));

	// $form->addInput('hp_ibu', 'text');
	// $form->setType('hp_ibu','number');
	// $form->setLabel('hp_ibu','No Hp Ibu');
	// $form->startCollapse('nama_ibu', 'Data Orang Tua - Ibu');
	// $form->endCollapse('hp_ibu');

	$form->addInput('prov','text');
	$form->setLabel('prov','Provinsi');
	$form->addInput('kab','text');
	$form->setLabel('kab','Kabupaten');
	$form->addInput('kec','text');
	$form->setLabel('kec','Kecamatan');
	$form->addInput('desa','text');
	$form->setLabel('desa','Desa');
	$form->addInput('kampung','text');
	$form->addInput('alamat', 'textarea');
	$form->startCollapse('prov', 'Alamat Tempat Tinggal');
	$form->endCollapse('alamat');

	// $jurusan = array(1=>'nautika kapal niaga',2=>'teknika kapal niaga',3=>'teknik permesinan',4=>'teknik otomotif kendaraan ringan',5=>'teknik elektronika industri',6=>'teknik mekatronika(program 4tahun)',7=>'teknik instalasi tenaga listrik');
	$j_tmp      = $this->db->get_where('keterampilan')->result_array();
	$jurusan    = array();

	if(!empty($j_tmp))
	{
		foreach ($j_tmp as $key => $value)
		{
			$jurusan[$value['id']] = $value['title'];
		}
	}

	$form->addInput('pil_1', 'dropdown');
	$form->setOptions('pil_1',$jurusan);
	$form->setLabel('pil_1','Pilihan 1');
	// $form->addInput('pil_2', 'dropdown');
	// $form->setOptions('pil_2',$jurusan);
	// $form->setLabel('pil_2','Pilihan 2');
	$form->addInput('photo','file');
	// $form->setAccept('photo', 'image/jpeg,image/png');
	$form->startCollapse('pil_1', 'Data Pemilihan Jurusan');
	$form->endCollapse('photo');
	// $form->setRequired('All');
	$form->setFormName('diklat_form');
	$form->form();
}else{
	echo msg('id peserta tidak diketahui');
}