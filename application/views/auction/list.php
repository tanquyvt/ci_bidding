<?php 
$now = date("Y-m-d H:i:s");
$now_unix = human_to_unix($now);
?>
<div class="container">
	<ul class="list-group">
		<li class="list-group-item">
			<h3>Something about sorting...</h3>
		</li>
		
		<?php foreach ($results as $row): ?>
		<?php 
			$end_unix = human_to_unix($row->end_time);
			if ($now_unix >= $end_unix) {
				$timeleft = "Ended ";
			} else {
				$timeleft = timespan($now_unix, $end_unix) . " left ";
			}
			

		 ?>
		<li class="list-group-item">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<img data-src="holder.js/175x175" alt="item img" class="img-thumbnail">
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<h3><a href="<?= base_url() . 'auction/detail/'. $row->iid; ?>"><?= $row->title; ?></a></h3>
					<h3><?= $row->hbid . " USD"; ?></h3>
					<p><b><?= $timeleft; ?>(<?= date_format(date_create($row->end_time), "l, g A"); ?>)</b></p>
					<p><?= $row->nbids ." bid(s)"; ?></p>
				</div>
			</div>
		</li>

		<?php endforeach; ?>

		<li class="list-group-item">
			<p><?= $links; ?></p>
		</li>
		
	</ul>
</div>
