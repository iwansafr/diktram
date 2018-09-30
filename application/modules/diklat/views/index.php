
<div class="col-md-2">

</div>
<div class="col-md-8">
	<?php
	echo '<h2>Formulir Pendaftaran</h2>';
	$form = new Ecrud();
	if(!empty($this->session->userdata(base_url().'_logged_in')))
	{
		$id = $this->input->get('id');
		$form->setId($id);
	}
	$form->init('edit');
	$form->setHeading('Peserta');
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
	$form->setLabel('pil_1','Jenis Diklat');
	$form->addInput('photo','file');
	// $form->setAccept('photo', 'image/jpeg,image/png');
	$form->startCollapse('pil_1', 'Pemilihan Diklat Keterampilan');
	$form->endCollapse('photo');
	$form->setRequired('All');
	$form->form();

	// pr($this->input->post());
	$last_id = $this->data_model->LAST_INSERT_ID();
	// pr($last_id);
	if(!empty($last_id))
	{
		$str   = 'KD-DK-';
		$zero  = 4;
		$l_id  = strlen($last_id);
		$zero  = $zero - $l_id;
		for($i = 0;$i<$zero;$i++)
		{
			$str .= '0';
		}
		$str .= $last_id;
		$this->data_model->set_data('diklat', $last_id, array('kode'=>$str));
		if(!empty($str))
		{
			?>
			<script type="text/javascript">
				document.location.href = '<?php echo base_url();?>diklat/success/<?php echo $str?>';
			</script>
			<?php
		}
	}
	?>
</div>
<div class="col-md-2">

</div>