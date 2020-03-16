<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<input class="search" type="text" placeholder="search..." value="<?php if (!empty($_GET['s'])) echo esc_attr($_GET['s']); ?>" name="s" id="s">
	<!-- <button id="searchsubmit" class="btn-search"><i class="fas fa-search"></i></button> -->
</form>
