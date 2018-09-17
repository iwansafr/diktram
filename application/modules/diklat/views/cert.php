<?php
$user = $this->session->userdata(base_url().'_diklat_logged_in');
if(!empty($user))
{
	$detail          = $this->db->get_where('diklat','id = '.$user['diklat_id'])->row_array();
	$certificate     = $this->db->get_where('peserta_cert','peserta_id = '.$user['id'])->result_array();
	$tot_certificate = count($certificate);
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
            <div class="col-md-6">
              <div class="profile-head">
                <h5>
                  <?php echo $detail['nama'] ?>
                </h5>
                <h6>
                  <?php echo $detail['nisn'] ?>
                </h6>
                <p class="proile-rating">Total Sertifikat : <span><?php echo $tot_certificate; ?></span></p>
              </div>
            </div>
            <div class="col-md-2">
                <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
              <div class="profile-work">
          <!--         <p>WORK LINK</p>
                  <a href="">Website Link</a><br/>
                  <a href="">Bootsnipp Profile</a><br/>
                  <a href="">Bootply Profile</a>
                  <p>SKILLS</p>
                  <a href="">Web Designer</a><br/>
                  <a href="">Web Developer</a><br/>
                  <a href="">WordPress</a><br/>
                  <a href="">WooCommerce</a><br/>
                  <a href="">PHP, .Net</a><br/> -->
              </div>
            </div>
            <div class="col-md-8">
            	<div>
							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detail</a></li>
							    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Sertifikat</a></li>
							  </ul>
							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="home">
							    	<div class="form-group">
								    	<div class="col-md-2">
								    		<p>Username</p>
								    	</div>
								    	<div class="col-md-10">
								    		<p><?php echo $user['username'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-2">
								    		<p>Email</p>
								    	</div>
								    	<div class="col-md-10">
								    		<p><?php echo $detail['email'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-2">
								    		<p>Nama</p>
								    	</div>
								    	<div class="col-md-10">
								    		<p><?php echo $detail['nama'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-2">
								    		<p>Tempat Lahir</p>
								    	</div>
								    	<div class="col-md-10">
								    		<p><?php echo $detail['tmpt_lahir'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-2">
								    		<p>Tgl Lahir</p>
								    	</div>
								    	<div class="col-md-10">
								    		<p><?php echo $detail['tgl_lahir'] ?></p>
								    	</div>
							    	</div>
							    	<div class="form-group">
								    	<div class="col-md-2">
								    		<p>Kelamin</p>
								    	</div>
								    	<div class="col-md-10">
								    		<p><?php echo !empty($detail['kelamin']) ? 'Laki-laki' : 'Perempuan'; ?></p>
								    	</div>
							    	</div>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="settings">
							    	<?php
							    	foreach ($certificate as $key => $value)
							    	{
							    		?>
							    		<div class="col-md-12">
							    			<label><?php echo $value['title'] ?></label>
							    			<p><a href="<?php echo image_module('peserta_cert',$value['id'].'/'.$value['file']) ?>"><?php echo $value['file'] ?></a></p>
							    			<p><?php echo $value['description'] ?></p>
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
	echo "\n";
	msg('you dont have permission to access this site please <a href="'.base_url('diklat/login').'">login</a>', 'danger');
}