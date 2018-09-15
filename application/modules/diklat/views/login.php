<br>
<div class="col-md-4">

</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-user"></i> login
		</div>
		<div class="panel-body">
			<?php
			if(!empty($status))
			{
				echo msg($status['msg']['msg'],$status['msg']['alert']);
			}
			?>
			<form action="" method="post">
				<div class="form-group">
					<label>username</label>
					<input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $this->input->post('username') ?>">
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
</div>
<div class="col-md-4">

</div>