<div class="container">
	<?php 
	echo "Title: ". $title ."</br>";
	echo "Category: ". $cid ."</br>";
	echo "Description: ". $description ."</br>";
	echo "Start bid: ". $starting_bid ."</br>";
	echo "Start time: ". $start_time ."</br>"; 
	echo "End time: ". $end_time ."</br>"; 
	echo "Increment: ". $increment. "</br>";
	echo "Reserve: ". $reserve ."</br>";
	echo "Duration: ". $duration ."</br>";
	?>

	<form action="<?php echo base_url(); ?>auction/insert" method="POST" role="form">
		<div class="form-group">
			<input type="hidden" name="title" id="inputTitle" class="form-control" value="<?php echo $title; ?>">
			<input type="hidden" name="cid" id="inputCid" class="form-control" value="<?php echo $cid; ?>">
			<input type="hidden" name="description" id="inputDescription" class="form-control" value="<?php echo $description; ?>">
			<input type="hidden" name="starting_bid" id="inputStarting_bid" class="form-control" value="<?php echo $starting_bid; ?>">
			<input type="hidden" name="start_time" id="inputStarttime" class="form-control" value="<?php echo $start_time; ?>">
			<input type="hidden" name="end_time" id="inputEndtime" class="form-control" value="<?php echo $end_time; ?>">
			<input type="hidden" name="increment" id="inputIncrement" class="form-control" value="<?php echo $increment; ?>">
			<input type="hidden" name="reserve" id="inputReserve" class="form-control" value="<?php echo $reserve; ?>">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
