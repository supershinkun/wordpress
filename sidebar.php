<!--サイドカラム-->
<aside id="pc_size" class="blog_menu col-xs-12 col-md-4">
	<!-- プロフィール -->
	<div class="col-xs-12 form-profile">
		<div class="out">
			<img src="<?php echo get_template_directory_uri(); ?>/img/profile.jpg" class="img-responsive img-circle">
		</div>
		<h4 class="line_gra">shinkun</h4>
		<p>未経験からIT業界へと進み、今はなんちゃってフリーランスとして働いています。現場ではインフラを中心に働いていますが、趣味でプログラミングやFXなども行なっています。</p>
		<p><a href="<?php echo home_url(); ?>/profile"><i class="far fa-user-circle"></i> プロフィールを見る</a><br>
		<a href="<?php echo home_url(); ?>/contact"><i class="far fa-question-circle"></i> お問い合わせ</a></p>
	</div>

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-6t+ed+2i-1n-4w"
     data-ad-client="ca-pub-2625715554076703"
     data-ad-slot="8769340339"></ins>
	<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
	</script>

	<!-- 検索フォーム -->
	<div class="col-xs-12 form-group">
		<?php get_search_form(); ?>
	</div>

	<!-- 人気の記事 -->
	<div class="col-xs-12 form-popular">
		<h4 class="line_gra">人気の記事</h4>
		<?php
			// views post metaで記事のPV情報を取得する
			setPostViews(get_the_ID());
			query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=5&order=DESC'); while(have_posts()) : the_post();
		?>

			<!-- 人気記事の表示 -->
			<a class="aside_box" href="<?php the_permalink(); ?>">
				<!-- サムネ画像 -->
				<div class="aside_img">
					<figure>
						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('post-thumbnail'); ?>
						<?php else: ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg">
						<?php endif; ?>
					</figure>
					<p>
						<span>R</span>
						<span>e</span>
						<span>a</span>
						<span>d</span>
					</p>
				</div>
				<!-- タイトル -->
				<h5><?php the_title(); ?></h5>
			</a>

		<?php endwhile; ?>
	</div>

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-6t+ed+2i-1n-4w"
     data-ad-client="ca-pub-2625715554076703"
     data-ad-slot="8769340339"></ins>
	<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
	</script>

	<!-- 月間アーカイブ -->
	<div class="col-xs-12 form-archive">
		<h4 class="line_gra">Archive</h4>
		<ul>
			<?php wp_get_archives('show_post_count=true&type=monthly'); ?>
		</ul>
	</div>

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-6t+ed+2i-1n-4w"
     data-ad-client="ca-pub-2625715554076703"
     data-ad-slot="8769340339"></ins>
	<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
	</script>

</aside>
<!---->
<!--サイドカラム-->



