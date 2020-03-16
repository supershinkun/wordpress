<?php 
	$thumbnail_id = get_post_thumbnail_id($article_id);
	$eye_img = wp_get_attachment_image_src( $thumbnail_id, true);
?>
<div class="related related-wrap" style="background-image: url(<?php echo $eye_img[0] ?>)">
	<div class="related-inner">
		<h3 class="line_gra">related article</h3>
		<div id="js-slide" class="js-slide-bottom">
			<?php
			$count = 0;
			$max_view = 5;
			$tags = wp_get_post_tags($article_id);	
			if($tags){
				$tag_ids = array();
				$test = array();
				foreach($tags as $individual_tag)
					$tag_ids[] = $individual_tag->term_id;
					$args = array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($article_id),
					'posts_per_page'=>$max_view, // 表示する関連記事の数
					'caller_get_posts'=>1,
					'orderby' => 'rand', // 過去記事に内部リンクできるので割と重要
				);
				$my_query = new wp_query($args);
			?>
				<!-- 他の記事に同じタグがある場合は実行される -->
				<?php if($my_query->have_posts()){
					while($my_query->have_posts()){
						$count += 1;
						$my_query->the_post();
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($article_id), 'thumbnail_size' );
						if ( !empty($thumb['0']) ) {
							$url = $thumb['0'];
						} else {
							$url = "http://design-ec.com/d/e_others_50/l_e_others_500.png";
					} ?>
						<!-- <div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail"> -->
						<a class="item" href="<?php the_permalink(); ?>">
							<!-- サムネ画像 -->
							<div class="aside_img">
								<figure>
									<?php if(has_post_thumbnail()): ?>
										<?php the_post_thumbnail('post-thumbnail'); ?>
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg">
									<?php endif; ?>
								</figure>
								<p class="bottom">
									<span>R</span>
									<span>e</span>
									<span>a</span>
									<span>d</span>
								</p>
							</div>
							<!-- タイトル -->
							<h5 class="bottom"><?php the_title(); ?></h5>
						</a>
						<!-- </div> -->
					<?php } // endwhile ?>
				<?php } //endif ?> 
			<?php } // endif ?>

			<!-- 関連タグのページが1-4記事しかなかった場合、
				5記事までの残りをカテゴリー記事で埋める -->
			<?php if($count!=0 && $count!=$max_view){
				$cat_num = $max_view - $count;
				$categories = get_the_category($article_id);
				$category_ID = array();
				foreach($categories as $category)
				 	array_push( $category_ID, $category->cat_ID);
				$args = array(
				  'category__in' => $category_ID,
				  'post__not_in' => array($article_id),
				  'posts_per_page'=> $cat_num,
				  'caller_get_posts'=>1,
				  'orderby' => 'rand',
				);
				$my_query = new WP_Query($args);			
			?>
				<?php
				while($my_query->have_posts()){
					$my_query->the_post();
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($article_id), 'thumbnail_size' );
					if ( !empty($thumb['0']) ) {
						$url = $thumb['0'];
					} else {
						$url = "http://design-ec.com/d/e_others_50/l_e_others_500.png";
				} ?>

					<!-- <div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail"> -->
					<a class="item" href="<?php the_permalink(); ?>">
						<!-- サムネ画像 -->
						<div class="aside_img">
							<figure>
								<?php if(has_post_thumbnail()): ?>
									<?php the_post_thumbnail('post-thumbnail'); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg">
								<?php endif; ?>
							</figure>
							<p class="bottom">
								<span>R</span>
								<span>e</span>
								<span>a</span>
								<span>d</span>
							</p>
						</div>
						<!-- タイトル -->
						<h5 class="bottom"><?php the_title(); ?></h5>
					</a>
					<!-- </div> -->
				<?php } // endwhile ?>
			<?php } //endif ?>

			<!-- 他の記事に同じタグが存在しなかった場合、
				カテゴリーから関連記事に -->
			<?php if($count==0){
				$categories = get_the_category($article_id);
				$category_ID = array();
				foreach($categories as $category)
				 	array_push( $category_ID, $category->cat_ID);
				$args = array(
				  'category__in' => $category_ID,
				  'post__not_in' => array($article_id),
				  'posts_per_page'=> $max_view,
				  'caller_get_posts'=>1,
				  'orderby' => 'rand',
				);
				$my_query = new WP_Query($args);
			?>
				<?php
				while($my_query->have_posts()){
					$my_query->the_post();
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($article_id), 'thumbnail_size' );
					if ( !empty($thumb['0']) ) {
						$url = $thumb['0'];
					} else {
						$url = "http://design-ec.com/d/e_others_50/l_e_others_500.png";
				} ?>

					<!-- <div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail"> -->
					<a class="item" href="<?php the_permalink(); ?>">
						<!-- サムネ画像 -->
						<div class="aside_img">
							<figure>
								<?php if(has_post_thumbnail()): ?>
									<?php the_post_thumbnail('post-thumbnail'); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg">
								<?php endif; ?>
							</figure>
							<p class="bottom">
								<span>R</span>
								<span>e</span>
								<span>a</span>
								<span>d</span>
							</p>
						</div>
						<!-- タイトル -->
						<h5 class="bottom"><?php the_title(); ?></h5>
					</a>
					<!-- </div> -->
				<?php } // endwhile ?>
			<?php } //endif ?>


			<?php wp_reset_query();?>
		</div>	
	</div>
</div>