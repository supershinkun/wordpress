<!--header取得-->
<?php get_header(); ?>
<!---->

<main id="main">
<div class="container">
<div class="row"><!--レスポンシブのgridに必要-->
<!--メインカラム-->
<div class="search-content content col-xs-12 col-md-8">
	<h1 class="search_title line_gra">
		<?php the_search_query(); ?>  の検索結果
	</h1>

	<?php if(have_posts() && get_search_query()): while(have_posts()): the_post(); ?>
	<article <?php post_class(); ?>>
		<!--タイトル-->
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<!---->

		<!--カテゴリー・時間・コメント-->
		<div class="post_info">
			<time datetime="<?php echo get_the_date('Y-m-d'); ?>">
				<i class="fas fa-clock"></i>
				<?php echo get_the_date('Y-m-d'); ?>
			</time>
			<span>
				<i class="fas fa-folder-open"></i>
				<?php the_category(', '); ?>	
			</span>
		</div>
		<!--  -->

		<!--本文抜粋-->
		<div class="excerpt">
			<!--アイキャッチ画像-->
			<?php if(has_post_thumbnail()): ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail'); ?></a>
			<?php endif; ?>
			<!--本文抜粋-->
			<?php the_excerpt(); ?>
			<div class="box_more border_gra">
				<a class="more" href="<?php the_permalink(); ?>">Read More</a>
			</div>
		</div>
		<!---->

	</article>
	<?php endwhile; endif; ?>

	<!--ページ全体の切り替え-->
	<?php if($wp_query->max_num_pages > 1): ?><!--ページ総数-->
		<div class="page_nav">
			<span class="prev">
				<?php previous_posts_link('<i class="fas fa-arrow-circle-left"></i> 前のページ'); ?>
			</span>
			<span class="next">
				<?php next_posts_link('次のページ <i class="fas fa-arrow-circle-right"></i>'); ?>
			</span>
		</div>
	<?php endif;?>
	<!---->

	<!--パンくず-->
	<div class="pan_nav">
		<ul>
			<li><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i></a></li>
			<li> > <?php the_search_query(); ?></li>
		</ul>
	</div>
	<!--  -->

</div>
<!--メインカラム-->


<!--サイドカラム-->
<?php get_sidebar(); ?>
<!--  -->
</div>
</div>
</main>
<!--row-->


<!--footer取得-->
<?php get_footer(); ?>
<!---->

