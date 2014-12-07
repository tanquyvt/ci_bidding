<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign up</title>

		<!-- Bootstrap CSS -->
		<link href="<?= base_url() ."bootstrap/css/bootstrap.min.css"; ?>" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.panel {
				margin-top: 10%;
			}
		</style>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?= base_url() .'bootstrap/js/bootstrap.min.js'; ?>"></script>

	</head>
	<body style="background-color:#eee">

		<div class="container">
			<div class="row">
				<!-- Left col -->
				<div class="col-sm-4 col-md-4 col-lg-4">
					
				</div>
				<!-- End of left col -->
				<!-- Mid col -->
				<div class="col-sm-4 col-md-4 col-lg-4">
					<!-- Form Content -->
					<!-- <h1 class="text-center">Online Auction</h1> -->
					<div class="panel panel-info">
						  <div class="panel-heading">
								<h3 class="panel-title">Sign up</h3>
						  </div>
						  <div class="panel-body">
						  	<form action="verifysignup" method="POST" role="form">
						  		<!-- <legend>Sign up</legend> -->

						  		<!-- First Name -->
						  		<div class="form-group">
						  			<label for="">First name</label>
						  			<input type="text" name="first_name" id="inputLastname" class="form-control" value="<?php if (isset($first_name)) {	echo $first_name; } ?>">
						  		</div>

						  		<!-- Last Name -->
						  		<div class="form-group">
						  			<label for="">Last name</label>
						  			<input type="text" name="last_name" id="inputLastname" class="form-control" value="<?php if (isset($last_name)) {	echo $last_name; } ?>">
						  		</div>

						  		<!-- Email -->
						  		<div class="form-group">
						  			<label for="">Email</label>
						  			<input type="text" name="email" id="inputEmail" class="form-control" value="<?php if (isset($email)) {	echo $email; } ?>">
						  		</div>

						  		<!-- Password -->
						  		<div class="form-group">
						  			<label for="">Password</label>
						  			<input type="password" name="password" id="inputPassword" class="form-control">
						  		</div>	

						  		<button type="submit" class="btn btn-primary">Sign up</button>
						  	</form>
						  </div>
					</div>

					
					<!-- End of form content -->
					<!-- Display validation errors -->
					
				 <!-- End of validation error display -->
				</div>
				<!-- End of mid col -->
				<div class="col-sm-4 col-md-4 col-lg-4">
					<?php 
					if (validation_errors()) {
						echo '
						<div class="panel panel-danger">
						<div class="panel-heading">
						<h3 class="panel-title">Form validation error(s)</h3>
						</div>
						<div class="panel-body">'.
						validation_errors()
						.'</div>
						</div>
						';
					}
				 ?>
				</div>

			</div>
		</div>

		
		
	</body>
</html>