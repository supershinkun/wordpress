<!--header取得-->
<?php get_header(); ?>
<!---->

<main id="main">
<div class="container">
<div class="row"><!--レスポンシブのgridに必要-->
<!--メインカラム-->
<div class="content col-xs-12 col-md-12 lp">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<article <?php post_class('only_page'); ?>>

		<!--タイトル-->
		<h1><?php the_title(); ?></h1>
		<!---->

		<!--本文-->
		<?php the_content(); ?>
		<!---->


	</article>
	<?php endwhile; endif; ?>
</div>
<!--メインカラム-->
</div>
</div>
</main>
<!--row-->


<!--footer取得-->
<?php get_footer(); ?>
<!---->


