<footer id="main-footer" class="footer mt-auto py-3 bg-body-tertiary">
	<div class="container">
		<?php
		$start_year = '2024';
		$current_year = date('Y');
		if($current_year == $start_year) {
			echo "<span class='text-body-secondary'>© $start_year AlmostHDcode</span>";
		} else {
			echo "<span class='text-body-secondary'>© $start_year - $current_year AlmostHDcode</span>";
		}
		?>
	</div>
</footer>