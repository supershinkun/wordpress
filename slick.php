<?php 
	//slickトップに表示したい記事のIDを記述
	$article_id = array(42,45,48,51,54);
	$count = count($article_id);
?>

<div class="slick_top col-xs-12 col-md-12">
	<div id="js-slide" class="js-slide-top">
		<?php for($i=0;$i<$count;$i++): $article = $article_id[$i];?>

			<a class="item" href="<?php echo get_permalink($article); ?>">
				<!-- サムネ画像 -->
				<div class="aside_img">
					<figure>
						<?php if(has_post_thumbnail($article)): ?>
							<?php echo get_the_post_thumbnail($article,'full'); ?>
						<?php else: ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg">
						<?php endif; ?>
					</figure>
					<p class="top">
						<span>R</span>
						<span>e</span>
						<span>a</span>
						<span>d</span>
					</p>
				</div>
				<!-- タイトル -->
				<h5 class="top"><?php echo get_the_title($article); ?></h5>
			</a>

		<?php endfor; ?>
	</div>	
</div>

