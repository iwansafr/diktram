<?php
$id = @intval($_GET['id']);

if(!empty($id))
{
	$detail = $this->db->get_where('diklat','id = '.$id, 1)->row_array();
	$kelamin = array('1'=>'Laki-laki','2'=>'Perempuan');
	$tot_certificate = 0;
	if(!empty($detail))
	{
		$user            = $this->db->get_where('peserta','diklat_id = '.$id, 1)->row_array();
		if(!empty($user['id']))
		{
			$certificate     = $this->db->get_where('peserta_cert','peserta_id = '.$user['id'])->result_array();
			$tot_certificate = count($certificate);
		}
	}
	if(!empty($detail))
	{
		?>
		<style type="text/css">
			body{
			    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
			}
			.emp-profile{
			    padding: 3%;
			    margin-top: 3%;
			    margin-bottom: 3%;
			    border-radius: 0.5rem;
			    background: #fff;
			}
			.profile-img{
			    text-align: center;
			}
			.profile-img img{
			    width: 70%;
			    height: 100%;
			}
			.profile-img .file {
			    position: relative;
			    overflow: hidden;
			    margin-top: -20%;
			    width: 70%;
			    border: none;
			    border-radius: 0;
			    font-size: 15px;
			    background: #212529b8;
			}
			.profile-img .file input {
			    position: absolute;
			    opacity: 0;
			    right: 0;
			    top: 0;
			}
			.profile-head h5{
			    color: #333;
			}
			.profile-head h6{
			    color: #0062cc;
			}
			.profile-edit-btn{
			    border: none;
			    border-radius: 1.5rem;
			    width: 70%;
			    padding: 2%;
			    font-weight: 600;
			    color: #6c757d;
			    cursor: pointer;
			}
			.proile-rating{
			    font-size: 12px;
			    color: #818182;
			    margin-top: 5%;
			}
			.proile-rating span{
			    color: #495057;
			    font-size: 15px;
			    font-weight: 600;
			}
			.profile-head .nav-tabs{
			    margin-bottom:5%;
			}
			.profile-head .nav-tabs .nav-link{
			    font-weight:600;
			    border: none;
			}
			.profile-head .nav-tabs .nav-link.active{
			    border: none;
			    border-bottom:2px solid #0062cc;
			}
			.profile-work{
			    padding: 14%;
			    margin-top: -15%;
			}
			.profile-work p{
			    font-size: 12px;
			    color: #818182;
			    font-weight: 600;
			    margin-top: 10%;
			}
			.profile-work a{
			    text-decoration: none;
			    color: #495057;
			    font-weight: 600;
			    font-size: 14px;
			}
			.profile-work ul{
			    list-style: none;
			}
			.profile-tab label{
			    font-weight: 600;
			}
			.profile-tab p{
			    font-weight: 600;
			    color: #0062cc;
			}
		</style>
		<div class="container emp-profile">
		  <form method="post">
		      <div class="col-md-12">
	          <div class="col-md-4">
              <div class="profile-img">
                  <img src="<?php echo image_module('diklat',$detail['id'].'/'.$detail['photo']) ?>" alt=""/>
                  <!-- <div class="file btn btn-lg btn-primary">
                      Change Photo
                      <input type="file" name="file"/>
                  </div> -->
              </div>
	          </div>
	          <div class="col-md-8">
	          	<div class="col-md-12">
		            <div class="profile-head">
		              <h5>
		                <?php echo $detail['nama'] ?>
		              </h5>
		              <h6>
		                ...
		              </h6>
		              <p class="proile-rating">Total Sertifikat : <span><?php echo $tot_certificate; ?></span></p>
		            </div>
	          	</div>
							<div class="col-md-12">
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detail</a></li>
							    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Sertifikat</a></li>
							  </ul>
							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="home">
							    	<div class="form-group">
								    	<div class="col-md-4">
								    		<p>Username</p>
								    	</div>
								    	<div class="col-md-8">
								    		<p><?php echo !empty($user['username']) ? $user['username'] : '-'; ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-4">
								    		<p>Email</p>
								    	</div>
								    	<div class="col-md-8">
								    		<p><?php echo $detail['email'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-4">
								    		<p>Nama</p>
								    	</div>
								    	<div class="col-md-8">
								    		<p><?php echo $detail['nama'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-4">
								    		<p>Tempat Lahir</p>
								    	</div>
								    	<div class="col-md-8">
								    		<p><?php echo $detail['tmpt_lahir'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-4">
								    		<p>Tgl Lahir</p>
								    	</div>
								    	<div class="col-md-8">
								    		<p><?php echo $detail['tgl_lahir'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-4">
								    		<p>Kelamin</p>
								    	</div>
								    	<div class="col-md-8">
								    		<p><?php echo @$kelamin[$detail['kelamin']] ?></p>
								    	</div>
							    	</div>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="settings">
							    	<?php
							    	if(!empty($certificate))
							    	{
					    				?>
							    		<div class="col-md-12">
							    			<table class="table table-responsive">
							    				<thead>
								    				<th>No</th>
								    				<th>Nama Sertifikat</th>
								    				<th>Nomor Sertifikat</th>
								    				<th>Issued</th>
								    				<th>Place of Issued</th>
							    				</thead>
							    				<tbody>
								    				<?php
								    				$i = 1;
											    	foreach ($certificate as $key => $value)
											    	{
											    		echo '<tr>';
											    		echo '<td>'.$i.'</td>';
											    		echo '<td>'.$value['title'].'</td>';
											    		echo '<td>'.$value['number'].'</td>';
											    		echo '<td>'.$value['issued'].'</td>';
											    		echo '<td>'.@$value['place_of_issued'].'</td>';
											    		echo '</tr>';
											    		$i++;
											    	}
								    				?>
							    				</tbody>
							    			</table>
							    		</div>
							    		<?php
							    	}
							    	?>
							    </div>
							  </div>
				      </div>
	          </div>
		      </div>
		  </form>
		</div>
		<?php
	}else{
		echo msg('id not found', 'danger');
	}
}else{
	echo msg('id not found', 'danger');
}