<!--header取得-->
<?php get_header(); ?>
<!---->

<main id="main" class="single_page">
<div class="container">
<div class="row"><!--レスポンシブのgridに必要-->
<!--メインカラム-->
<div class="col-xs-12 col-md-8">

	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<article <?php post_class('single-page'); ?>>
		<!--タイトル-->
		<h1><?php the_title(); ?></h1>
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
		<!---->

		<!-- サムネイルの自動挿入 -->
		<?php if(has_post_thumbnail()): ?>
			<figure><span itemprop="image">
				<?php the_post_thumbnail('post-thumbnail' ,array('itemprop'=>'image', 'class' => 'img-responsive max-width') ); ?>
			</span></figure>
		<?php else: ?>
			<?php echo "<br />" ?>
		<?php endif; ?>
		<!--  -->

		<!-- 本文 -->
		<?php the_content(); ?>
		<!--  -->

		<!-- sns -->
		<?php get_template_part('sns'); ?>
		<!--  -->

		<!--コメント-->
		<?php //comments_template(); ?>
		<!---->

		<!--パンくず-->
		<div class="pan_nav">
			<ul>
				<li><a href="<?php echo home_url(); ?>"><i class="fas fa-home"></i></a></li>
				<li> > <?php the_category('>'); ?></li>
				<li> > <?php the_title(); ?></li>
			</ul>
		</div>
		<!--  -->

	</article>
	<?php endwhile; endif; ?>






<!-- 記事のID取得 -->
<?php $article_id = get_the_ID(); ?>
<!--  -->
</div>
<!--メインカラム-->


<!--PCサイズのサイドカラム-->
<?php get_sidebar(); ?>
<!--  -->

<!-- 関連記事 -->
<?php
	set_query_var('article_id', $article_id);
	get_template_part('related');
?>
<!--  -->

<!-- tablet,携帯でのサイドからむ -->
<?php get_template_part('get_sidebar_tab'); ?>
<!--  -->

</div>
</div>
</main>
<!--row-->




<!--footer取得-->
<?php get_footer(); ?>
<!---->


