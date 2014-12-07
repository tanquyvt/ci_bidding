<?php 

$date = date("Y-m-d H:i:s");
$unix = human_to_unix($date);
?>
<div class="container">
	<div class="row">
		<?php 
		foreach ($auction as $auc) {
			//$sd = human_to_unix($auc['start_time']);
			$ed = human_to_unix($auc['end_time']);
			echo '
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			<div class="thumbnail">
			<img data-src="holder.js/100x100" alt="Thumbnail" class="img-thumbnail img-responsive" />
			<div class="caption">
			<h3><a href="' . base_url() . 'auction/detail/'. $auc['iid'] .'">'. $auc['title'] .'</a></h3>
			<p>'. $auc['description'] .'</p>
			<p>Start time: '. $auc['start_time'] .'</p>
			<p>Now: '. $date = date("Y-m-d H:i:s") .'</p>
			<p>End time: '. $auc['end_time'] .'</p>';
			if ($auc['is_active'] == 0) {
				echo "<p>Expired!</p>";
			} else {
				echo '<p>'. timespan($unix, $ed) .'</p>';
			}
			echo '</div>
			</div>
			</div>
			';
		}
		?>

		<script src="<?php echo base_url(); ?>img/holder.js"></script>
	</div>
</div>