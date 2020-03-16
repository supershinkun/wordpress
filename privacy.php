<?php
	/*
	Template Name: プライバシー・免責事項
	*/
?>
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

		<!-- 本文 -->
		<?php the_content(); ?>
		<!--  -->

	</article>
	<?php endwhile; endif; ?>

</div>
<!--メインカラム-->


<!--PCサイズのサイドカラム-->
<?php get_sidebar(); ?>
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


