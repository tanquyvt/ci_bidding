<body>
	<div class="container">

		<form action="verifysignup" method="POST" role="form">
			<legend>Sign up</legend>

			<!-- First Name -->
			<div class="form-group">
				<label for="">First name</label>
				<input type="text" name="first_name" id="inputLastname" class="form-control" required value="<?php if (isset($first_name)) {	echo $first_name; } ?>" placeholder="First name">
				<i style="color:red"><?php echo form_error('first_name'); ?></i>
			</div>

			<!-- Last Name -->
			<div class="form-group">
				<label for="">Last name</label>
				<input type="text" name="last_name" id="inputLastname" class="form-control" required value="<?php if (isset($last_name)) {	echo $last_name; } ?>" placeholder="Last name">
				<i style="color:red"><?php echo form_error('last_name'); ?></i>
			</div>

			<!-- Email -->
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" name="email" id="inputEmail" class="form-control" required value="<?php if (isset($email)) {	echo $email; } ?>" placeholder="Email">
				<i style="color:red"><?php echo form_error('email'); ?></i>
			</div>

			<!-- Password -->
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" id="inputPassword" class="form-control" required placeholder="Password">
				<i style="color:red"><?php echo form_error('password'); ?></i>
			</div>	

			<button type="submit" class="btn btn-primary">Sign up</button>
		</form>

	</div>