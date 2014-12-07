<?php echo $header; ?>
<body>
	<h1 class="text-center"><?php echo strtoupper($heading); ?></h1>

	<!-- jQuery -->
	<!-- // <script src="//code.jquery.com/jquery.js"></script> -->
	<!-- Bootstrap JavaScript -->
	<!-- // <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->

	<?php echo validation_errors(); ?>

	<div class="container">
		<div class="row">
			<form action="<?php echo base_url(); ?>user/validate" method="POST" role="form">

				<div class="form-group">
					<label for="inputFirstname" class="col-sm-2">Firstname</label>
					<input type="text" name="first_name" id="inputFirstname" class="form-control">
				</div>

				<div class="form-group">
					<label for="inputLastname" class="col-sm-2">Lastname</label>
					<input type="text" name="last_name" id="inputLastname" class="form-control" >
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-sm-2">Email</label>
					<input type="email" name="email" id="inputEmail" class="form-control">
				</div>

				<div class="form-group">
					<label for="inputPassword" class="col-sm-2">Password</label>
					<input type="password" name="password" id="inputPassword" class="form-control" >
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>

<?php echo $footer; ?>