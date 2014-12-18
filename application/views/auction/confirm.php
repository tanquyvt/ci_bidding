<div class="container">
	<form action="<?php echo base_url(); ?>auction/insert" method="POST" role="form">
		<legend>Review to confirm</legend>
		<?php 
		$end_time = date_create($start_time);
		date_add($end_time,date_interval_create_from_date_string($duration . "days"));
		echo "Title: ". $title ."</br>";
		echo "Category: ". $cid ."</br>";
		echo "Description: ". $description ."</br>";
		echo "Start bid: ". $starting_bid ."</br>";
		echo "Start time: ". $start_time ."</br>"; 
		echo "End time: ". date_format($end_time, "Y-m-d H:i:s") ."</br>"; 
		echo "Increment: ". $increment. "</br>";
		echo "Reserve: ". $reserve ."</br>";
		echo "Duration: ". $duration ."</br>";
		?>

		<div class="form-group">
			<input type="hidden" name="title" id="inputTitle" class="form-control" value="<?php echo $title; ?>">
			<input type="hidden" name="cid" id="inputCid" class="form-control" value="<?php echo $cid; ?>">
			<input type="hidden" name="description" id="inputDescription" class="form-control" value="<?php echo $description; ?>">
			<input type="hidden" name="starting_bid" id="inputStarting_bid" class="form-control" value="<?php echo $starting_bid; ?>">
			<input type="hidden" name="start_time" id="inputStarttime" class="form-control" value="<?php echo $start_time; ?>">
			<input type="hidden" name="end_time" id="inputEndtime" class="form-control" value="<?= date_format($end_time, "Y-m-d H:i:s"); ?>">
			<input type="hidden" name="increment" id="inputIncrement" class="form-control" value="<?php echo $increment; ?>">
			<input type="hidden" name="reserve" id="inputReserve" class="form-control" value="<?php echo $reserve; ?>">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
