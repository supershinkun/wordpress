<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 twitter">
				<h4 class="line_gra">Twitter</h4>
				<a class="twitter-timeline" data-height="450" href="https://twitter.com/shinkunlog?ref_src=twsrc%5Etfw">Tweets by shinkunlog</a>
				<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>

			<div class="col-xs-12 col-md-6 tag">
				<h4 class="line_gra">Tags</h4>
				<?php
				// パラメータを指定
				$args = array(
					// タグ名順で指定
				    'orderby' => 'name',
				    // 昇順で指定
				    'order' => 'ASC'
				);
				$posttags = get_tags( $args );

				if ( $posttags ){
					echo ' <ul class="tag-list"> ';
					foreach( $posttags as $tag ) {
						echo '<li><a href="'. get_tag_link( $tag->term_id ) .'">' . $tag->name . '</a></li>';
					}
					echo ' </ul> ';
				}
				?>
			</div>
		</div>
	</div>

  <div class="footer">
  	<small><a href="<?php echo home_url(); ?>/privacy/">プライバシーポリシー</a><br>
  		Copyright2019 &copy; <?php bloginfo('name') ?> All Rights Reserved.</small>
  </div>
</footer>

<?php wp_footer(); ?><!--ダッシュボードの表示-->
<!---->
</body>
</html>



