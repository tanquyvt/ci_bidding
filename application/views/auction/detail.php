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
	?>
	<form action="#" method="POST" role="form">
		<legend>Form title</legend>

		<div class="form-group">
			<label for="">label</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>