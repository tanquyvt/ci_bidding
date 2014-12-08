<body>
	<div class="container">
		
			<form action="verifysignin" method="POST" role="form">
				<legend>Sign in</legend>
			
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" id="inputEmail" class="form-control" required="required" value="<?php if (isset($email)) {	echo $email; } ?>" placeholder="Email">
					<i style="color:red"><?php echo form_error('email'); ?></i>
				</div>
			
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" id="inputPassword" class="form-control" required="required" placeholder="Password">
					<i style="color:red"><?php echo form_error('password'); ?></i>
				</div>
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>