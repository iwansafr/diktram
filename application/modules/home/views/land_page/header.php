<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
	<div class="row" style="margin-top: 7%;">
		<div class="col-lg-12">
			<div class="col-md-4">
						<?php
						$status = array();
						if(!empty($this->input->post()))
						{
							$tmp_data = $this->input->post();
							$peserta  = $this->db->query('SELECT * FROM peserta WHERE username = ? LIMIT 1', array($tmp_data['username']))->row_array();
							if(!empty($peserta))
							{
								if($tmp_data['password'] == $peserta['password'])
								{
									$this->session->set_userdata(base_url().'_diklat_logged_in', $peserta);
								}else{
									$status['msg']['alert'] = 'danger';
									$status['msg']['msg']   = 'password salah';
								}
							}else{
								$status['msg']['alert'] = 'danger';
								$status['msg']['msg']   = 'username tidak dikenali';
							}
						}
						if(!empty($status))
						{
							echo msg($status['msg']['msg'],$status['msg']['alert']);
						}
						$user = $this->session->userdata(base_url().'_diklat_logged_in');
						if(empty($user))
						{
							?>
							<div class="panel panel-primary">
								<div class="panel-heading">
									<i class="fa fa-user"></i> login
								</div>
								<div class="panel-body">
									<form action="" method="post">
										<div class="form-group">
											<center>
												<img src="<?php echo image_module('config', 'logo/'.@$logo_value['image']) ?>" height="75">
											</center>
										</div>
										<div class="form-group">
											<label>username</label>
											<input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $this->input->post('username') ?>" required>
										</div>
										<div class="form-group">
											<label>password</label>
											<input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $this->input->post('password')?>">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-sign-in"></i> Login</button>
											<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-recycle"></i> Reset</button>
										</div>
									</form>
								</div>
								<div class="panel-footer">
								</div>
							</div>
							<?php
						}else{
							?>
							<div class="panel panel-primary">
								<div class="panel-heading">
									<i class="fa fa-user"></i> Peserta
								</div>
								<div class="panel-body">
									<div class="form-group">
										username : <?php echo $user['username'] ?>
									</div>
									<div class="form-group">
										<a href="<?php echo base_url('diklat/cert') ?>"><button class="btn btn-primary">profile</button></a>
									</div>
								</div>
								<div class="panel-footer">
									<a href="<?php echo base_url('user/logout') ?>">logout</a>
								</div>
							</div>
							<?php
						}?>
			</div>
			<div class="col-md-8">
				<?php
				$tahun = 2018;

				$pendaftar           = array();
				$pendaftar['male']   = $this->db->query('SELECT kelamin FROM diklat WHERE kelamin = ?', array(1))->num_rows();
				$pendaftar['female'] = $this->db->query('SELECT kelamin FROM diklat WHERE kelamin = ?', array(0))->num_rows();

				$pelaut = array();
				for($i =1 ;$i<13;$i++)
				{
					$num = $i < 10 ? '0'.$i : $i;
					$pelaut[] = $this->db->query('SELECT id FROM peserta WHERE created LIKE ?', array("{$tahun}-{$num}-%"))->num_rows();
				}
				$pelaut = json_encode($pelaut);
				?>
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#Pendaftar" aria-controls="Pendaftar" role="tab" data-toggle="tab">Data Pelaut Sepanjang Masa</a></li>
			    <li role="presentation" ><a href="#Peserta" aria-controls="Peserta" role="tab" data-toggle="tab">Pelaut Sepanjang Tahun <?php echo $tahun ?></a></li>
			    <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Tabel Data</a></li>
			  </ul>
			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="Pendaftar">
			    	<div class="box box-danger">
	            <div class="box-header with-border">
	              <h3 class="box-title">Prosentase jumlah pelaut berdasarkan jenis kelamin</h3>
	            </div>
	            <div class="box-body">
	              <canvas id="pendaftarChart"></canvas>
	            </div>
	            <!-- /.box-body -->
	          </div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="Peserta">
			    	<div class="box box-danger">
	            <div class="box-header with-border">
	              <h3 class="box-title">Jumlah pelaut sepanjang tahun</h3>
	            </div>
	            <div class="box-body">
	              <canvas id="pesertaChart"></canvas>
	            </div>
	            <!-- /.box-body -->
	          </div>
			    </div>
          <div role="tabpanel" class="tab-pane" id="data">
			    	<div class="box box-success">
	            <div class="box-header with-border">
	            </div>
	            <div class="box-body">
	              <div class="chart">
	              	<h5 class="box-title"><?php echo strtoupper('jumlah pelaut berdasarkan jenis kelamin per '.date('d M Y')) ?></h5>
	              	<table class="table table-responsive">
	              		<?php
	              		$total = 0;
	              		foreach ($pendaftar as $key => $value)
	              		{
	              			$kelamin = $key == 'male' ? 'Laki-laki' : 'Perempuan';
	              			$total += $value;
	              			?>
	              			<tr>
	              				<td><?php echo $kelamin ?></td>
	              				<td><?php echo $value ?></td>
	              				<td><?php echo strtolower('pelaut') ?></td>
	              			</tr>
	              			<?php
	              		}
	              		?>
	              		<tr>
	              			<td><?php echo strtoupper('total') ?></td>
	              			<td><?php echo $total ?></td>
	              			<td><?php echo strtolower('pelaut') ?></td>
	              		</tr>
	              	</table>
	              </div>
	              <div class="chart">
	              	<h5 class="box-title"><?php echo strtoupper('jumlah sertifikat yang telah diterbitkan per '.date('d M Y')) ?></h5>
	              	<table class="table table-responsive">
	              		<?php
	              		$sertifikat = $this->db->get_where('cert')->result_array();
	              		$total = 0;
	              		foreach ($sertifikat as $key => $value)
	              		{
	              			$jumlah = $this->db->get_where('peserta_cert','cert_id = '.$value['id'])->num_rows();
	              			$total += $jumlah;
	              			?>
	              			<tr>
	              				<td><?php echo $value['title'] ?></td>
	              				<td><?php echo $jumlah ?></td>
	              				<td><?php echo strtolower('sertifikat') ?></td>
	              			</tr>
	              			<?php
	              		}
	              		?>
	              		<tr>
	              			<td><?php echo strtoupper('total') ?></td>
	              			<td><?php echo $total ?></td>
	              			<td><?php echo strtolower('sertifikat') ?></td>
	              		</tr>
	              	</table>
	              </div>
	            </div>
	            <!-- /.box-body -->
	          </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php

$ext = array();
ob_start();
?>
<script src="<?php echo base_url().'templates/land_page/js/mdb.min.js' ?>"></script>
<script type="text/javascript">
	//pie
	var ctxP = document.getElementById("pendaftarChart").getContext('2d');
	var myPieChart = new Chart(ctxP, {
	    type: 'pie',
	    data: {
	        labels: ['laki-laki','perempuan'],
	        datasets: [
	            {
	                data: [<?php echo @intval($pendaftar['male']).','.@intval($pendaftar['female']) ?>],
	                backgroundColor: ["#7bb5ec","#434348"],
	                hoverBackgroundColor: ["#25b7ef","#696363"]
	            }
	        ]
	    },
	    options: {
	        responsive: true
	    }
	});

	var ctx = document.getElementById("pesertaChart").getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
	        datasets: [{
	            label: ' Jumlah Pelaut',
	            data: <?php echo $pelaut ?>,
	            backgroundColor: [
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(54, 162, 235, 0.2)'

	            ],
	            borderColor: [
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(54, 162, 235, 1)',
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
</script>
<?php
$ext = ob_get_contents();
ob_end_clean();
$this->session->set_userdata('js_extra', $ext);