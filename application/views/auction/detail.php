<?php 
$now = date("Y-m-d H:i:s");
$now_unix = human_to_unix($now);
?>
<div class="container">
	<legend>Auction detail</legend>

	<?php foreach ($result as $row): ?>
	<?php 
	$end_unix = human_to_unix($row->end_time);
	if ($now_unix >= $end_unix) {
				$timeleft = "Ended ";
			} else {
				$timeleft = timespan($now_unix, $end_unix) . " left ";
			}
	?>
	<h3><?= $row->title; ?></h3>
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<img data-src="holder.js/175x175" alt="item img" class="img-thumbnail">
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<p>Time left: <span style="color:red;"><?= $timeleft; ?></span></p>
			<h3><?= $row->hbid . " USD"; ?></h3>
			<p><?= $row->nbids ." bid(s)"; ?></p>
			<form action="<?= base_url() . 'verifybid'; ?>" method="POST" role="form">
				<div class="form-group">
					<label for="">Bid price</label>
					<input type="number" name="bid_price" id="inputBid_price" class="form-control" required="required" placeholder="USD">
					<input type="hidden" name="iid" id="inputIid" class="form-control" value="<?= $row->iid; ?>">
					<input type="hidden" name="hbid" id="inputHbid" class="form-control" value="<?= $row->hbid; ?>">
					<input type="hidden" name="nbids" id="inputNbids" class="form-control" value="<?= $row->nbids; ?>">
				</div>
				<?= form_error('bid_price'); ?>
				<button type="submit" class="btn btn-primary">Place bid</button>
			</form>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<p>Seller information</p>
		</div>
	</div>
		<!-- echo "Title: ". $row->title ."</br>";
		echo "Category: ". $row->cid ."</br>";
		echo "Description: ". $row->description ."</br>";
		echo "Start bid: ". $row->starting_bid ."</br>";
		echo "Start time: ". $row->start_time ."</br>"; 
		echo "End time: ". $row->end_time ."</br>"; 
		echo "Increment: ". $row->increment. "</br>";
		echo "Reserve: ". $row->reserve ."</br>"; -->
	<?php endforeach; ?>

</div>