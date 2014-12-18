<div class="container">
	<form action="<?php echo base_url(); ?>auction/confirm" method="POST" role="form">
		<legend>Auction add</legend>
		<div class="form-group">
			<label for="">Title</label>
			<input type="text" name="title" id="inputTitle" class="form-control" required="required" >
		</div>

		<div class="form-group">
			<label for="">Category</label>
			<select name="cid" id="inputcid" class="form-control" required="required">
				<?php 
				foreach ($cid as $value) {
					echo '<option value="'. $value['cid'] .'">'. $value['name'] .'</option>';
				}
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="">Description</label>
			<textarea name="description" class="form-control" rows="3"></textarea>
		</div>

		<div class="form-group">
			<label for="">Starting bid</label>
			<input type="number" name="starting_bid" id="inputStartingbid" class="form-control"  required="required" >
		</div>

		<div class="form-group">
			<label for="">Duration</label>
			<select name="duration" id="inputDuration" class="form-control" required="required">
				<option value="3">3 days</option>
				<option value="5">5 days</option>
				<option value="7">7 days</option>
			</select>
		</div>

		<div class="form-group">
			<label for="">Increment</label>
			<input type="number" name="increment" id="inputIncrement" class="form-control" required="required" title="Bước giá">
		</div>

		<div class="form-group">
			<label for="">Reserve</label>
			<input type="number" name="reserve" id="inputReserve" class="form-control" value="" min="" max="" step="" required="required" title="">
		</div>

		<!-- Hidden inputs -->
		<?php 
			$start_time = date("Y-m-d H:i:s"); // local datetime strings
			?>
		<input type="hidden" name="start_time" id="inputStart_time" class="form-control" value="<?php echo $start_time; ?>">

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>