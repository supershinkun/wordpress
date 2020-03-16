<?php
	// ウィジェットを有効にしている
	register_sidebar();

	//カテゴリー投稿数のdisplay block対策
	function mymenu_cat($src){
		$src = preg_replace('/<\/a> \((\d+)\)/', ' ($1)</a>', $src);
		return $src;
	}
	add_filter('wp_list_categories', 'mymenu_cat');

	//アーカイブ投稿数のdisplay block対策
	function mymenu_month($src){
		$src = preg_replace('/<\/a>&nbsp;\((\d+)\)/', ' ($1)</a>', $src);
		return $src;
	}
	add_filter('get_archives_link', 'mymenu_month');

	//rssフィード
	add_theme_support('automatic-feed-links');

	//コメ欄からurl,emailを削除
	function my_comment_form_remove($args) {
	$args['url'] = '';
	$args['email'] = '';
	return $args;
	}
	add_filter('comment_form_default_fields', 'my_comment_form_remove');
	//「メールアドレスが公開されることはありません」を削除
	function my_comment_form_before($args){
	$args['comment_notes_before'] = '';
	return $args;
	}
	add_filter( "comment_form_defaults", "my_comment_form_before");
	 
	//ナビ(location:navigation, 説明:ナビゲーション)
	register_nav_menu('navigation', 'ナビゲーション');

	//カスタムヘッダー
	add_theme_support('custom-header', array(
		'width'=>1500,
		'height' =>250,
		'default-image'=>'%s/img/no-image.jpg'
		));
	//カスタム背景
	add_theme_support('custom-background');

	//本文抜粋の文字数(デフォは140なので、これは実際変わってない。)
	function my_length($length){
		return 140;
	}
	add_filter('excerpt_length', 'my_length');
	//本文抜粋の省略文字(デフォは[...])
	function my_more($more){
		return '';
	}
	add_filter('excerpt_more', 'my_more');
	//アイキャッチ画像
	add_theme_support('post-thumbnails');

	//ウィジェットのh2をh3に、</h3>下に<hr>追加
	// function my_widget_title($widget_title) {
	// 	var_dump($widget_title);
	// 	return;
	// add_filter('widget_title', 'my_widget_title');
	// }

	//ページ全体の切り替えにclassをつける
	function add_prev_posts_link_class() {
	 	return 'class="border_gra"';
	}
	add_filter( 'previous_posts_link_attributes', 'add_prev_posts_link_class' );
	function add_next_posts_link_class() {
	 	return 'class="border_gra"';
	}
	add_filter( 'next_posts_link_attributes', 'add_next_posts_link_class' );

	//記事の前後移動にclassをつける
	function previous_post_link_attributes($output) {
	    return str_replace('<a href=', '<a class="border_gra" href=', $output);
	}
	add_filter('previous_post_link', 'previous_post_link_attributes');
	function next_post_link_attributes($output) {
	    return str_replace('<a href=', '<a class="border_gra" href=', $output);
	}
	add_filter('next_post_link', 'next_post_link_attributes');

	// 人気記事出力用
	function getPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '0');
				return "0 View";
		}
		return $count.' Views';
	}
	function setPostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
				$count = 0;
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '0');
		}else{
				$count++;
				update_post_meta($postID, $count_key, $count);
		}
	}
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	//投稿画面のhtmlタグ編集(削除)
	function remove_html_editor_buttons($qt_init) {
	  $remove = array('em','link','img','code','more','blockquote','close','block'); // ここに削除したいものを記述
	  $qt_init['buttons'] = implode(',', array_diff(explode(',', $qt_init['buttons']), $remove));
	  return $qt_init;
	}
	add_filter( 'quicktags_settings', 'remove_html_editor_buttons' );
	//投稿画面のhtmlタグ編集(追加)
	function appthemes_add_quicktags() {
		$content = strip_tags(strip_shortcodes(get_the_content('')));
	    ?>
	    <script type="text/javascript">
	    	QTags.addButton('イントロ', 'イントロ', '<div class="gray intro">\n	<div class="image"><img src="https://shinkunlog.com/wp-content/uploads/2019/04/dog3_1_question.png" alt="" width="562" height="638"class="alignnone size-full wp-image-116" /></div>\n	<div class="text"><p></p></div>\n</div>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('h2', 'h2', '<h2>', '</h2>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('h3', 'h3', '<h3>', '</h3>');
	    </script>
		<script type="text/javascript">
	    	QTags.addButton('i', 'i', '<p class="check"><i class="fas fa-pen"></i>', '</p>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('Link', 'Link', '<p class="link"><a href=""><i class="fas fa-external-link-alt"></i></a></p>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('nLink', 'nLink', '[nlink url=""]');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('灰枠', '灰枠', '<div class="gray">', '</div>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('緑枠', '緑枠', '<div class="green">', '</div>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('太線', '太線', '<span class="bold">', '</span>');
	    </script>  
	    <script type="text/javascript">
	    	QTags.addButton('青線', '青線', '<span class="blue_line">', '</span>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('緑線', '緑線', '<span class="green_line">', '</span>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('b-quote', 'b-quote', '<blockquote cite="引用元url">', '</blockquote>');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('kattene', 'kattene', '<div class="kattene">\n	<div>\n		<div class="kattene__imgpart"><a target="_blank" href="【メインのURL】"><img src="【画像URL】"></a></div>\n		<div class="kattene__infopart">\n			<div class="kattene__title"><a target="_blank" href="【メインのURL】">【タイトル】</a></div>\n			<div class="kattene__description">【説明】</div>\n			<div class="kattene__btns __three">\n				<div><a class="kattene__btn __orange" target="_blank" href="【商品のURL】">Amazon</a></div>\n				<div><a class="kattene__btn __blue" target="_blank" href="【商品のURL】">Kindle</a></div>\n				<div><a class="kattene__btn __red" target="_blank" href="【商品のURL】">楽天ブックス</a></div>\n			</div>\n		</div>\n	</div>\n</div>\n');
	    </script>
	    <script type="text/javascript">
	    	QTags.addButton('<', '<', '&lt;');
	    </script>	    
	    <script type="text/javascript">
	    	QTags.addButton('>', '>', '&gt;');
	    </script>	    
	    <?php
		}
	add_action('admin_print_footer_scripts', 'appthemes_add_quicktags');

	//スマホのみ条件分岐
	function is_mobile(){
		$useragents = array(
			'iPhone', // iPhone
			'iPod', // iPod touch
			'Android.*Mobile', // 1.5+ Android *** Only mobile
			'Windows.*Phone', // *** Windows Phone
			'dream', // Pre 1.5 Android
			'CUPCAKE', // 1.5+ Android
			'blackberry9500', // Storm
			'blackberry9530', // Storm
			'blackberry9520', // Storm v2
			'blackberry9550', // Storm v2
			'blackberry9800', // Torch
			'webOS', // Palm Pre Experimental
			'incognito', // Other iPhone browser
			'webmate' // Other iPhone browser
			);
		$pattern = '/'.implode('|', $useragents).'/i';
		return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
	}

	//adminログインのurl変更
	define( 'LOGIN_PAGE', 'shinkunnoadmin.php');
	add_action( 'login_init', 'admin_login_init');
	function admin_login_init()
	{
	    if( !defined('LOGIN_KEY') || password_verify( 'test', LOGIN_KEY) === false ) {
	        header('Location:' . site_url() . '/404.php');
	        exit;
	    }
	}
	add_filter( 'site_url', 'admin_login_site_url', 10, 4);
	function admin_login_site_url( $url, $path, $orig_scheme, $blog_id)
	{
	    if( ($path == 'wp-login.php' || preg_match( '/wp-login\.php\?action=\w+/', $path) ) && (is_user_logged_in() || strpos( $_SERVER['REQUEST_URI'], LOGIN_PAGE) !== false) ) {
	        $url = str_replace( 'wp-login.php', LOGIN_PAGE, $url);
	    }
	    return $url;
	}
	add_filter( 'wp_redirect', 'admin_login_wp_redirect', 10, 2);
	function admin_login_wp_redirect( $location, $status) {
	    if( is_user_logged_in() && strpos( $_SERVER['REQUEST_URI'], LOGIN_PAGE) !== falsee ) {
	        $location = str_replace( 'wp-login.php', LOGIN_PAGE, $location);
	    }
	    return $location;
	}


	function add_ads_before_h2($the_content) {
		if (is_single()) {
			$ads = <<< EOF
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-2625715554076703"
     data-ad-slot="4722994558"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
EOF;
			$h2 = '/^.+?<\/h2>$/im';//H2見出しのパターン

			if ( preg_match_all( $h2, $the_content, $h2s )) {
				if ( $h2s[0] ) {
				    // 1つ目のh2見出しの上にアドセンス挿入
				    if ( $h2s[0][0] ) {
				      $the_content  = str_replace($h2s[0][0], $ads.$h2s[0][0], $the_content);
				    }
				    // 3つ目のh2見出しの上にアドセンス挿入
				    if ( $h2s[0][2] ) {
				      $the_content  = str_replace($h2s[0][2], $ads.$h2s[0][2], $the_content);
				    }
				    // 5つ目のh2見出しの上にアドセンス挿入
				    if ( $h2s[0][4] ) {
				      $the_content  = str_replace($h2s[0][4], $ads.$h2s[0][4], $the_content);
				    }
				    // 7つ目のh2見出しの上にアドセンス挿入
				    if ( $h2s[0][6] ) {
				      $the_content  = str_replace($h2s[0][6], $ads.$h2s[0][6], $the_content);
				    }
  				}
			}
		}
		return $the_content;
	}
	add_filter('the_content','add_ads_before_h2');


	// 記事IDを指定して抜粋文を取得する
	function ltl_get_the_excerpt($post_id){
	  global $post;
	  $post_bu = $post;
	  $post = get_post($post_id);
	  setup_postdata($post_id);
	  // $output = get_the_excerpt();
	  $output = mb_substr(get_the_excerpt(), 0, 60);
	  $post = $post_bu;
	  return $output;
	}

	//内部リンクをはてなカード風にするショートコード
	// function my_length($length){
	// 	return 70;
	// }
	// add_filter('excerpt_length', 'my_length');
	function nlink_scode($atts) {
		extract(shortcode_atts(array(
			'url'=>"",
			'title'=>"",
			'excerpt'=>""
		),$atts));

		$id = url_to_postid($url);//URLから投稿IDを取得

		$img_width ="180";//画像サイズの幅指定
		$img_height = "120";//画像サイズの高さ指定
		$no_image = 'noimageに指定したい画像があればここにパス';//アイキャッチ画像がない場合の画像を指定

		//タイトルを取得
		if(empty($title)){
			$title = esc_html(get_the_title($id));
		}
	    //抜粋文を取得
		if(empty($excerpt)){
			$excerpt = esc_html(ltl_get_the_excerpt($id));
		}

	    //アイキャッチ画像を取得
	    if(has_post_thumbnail($id)) {
	        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id),array($img_width,$img_height));
	        $img_tag = "<img class=\"blog_card\" src='" . $img[0] . "' alt='{$title}' width=" . $img[1] . " height=" . $img[2] . " />";
	    }else{ 
	    $img_tag ='<img class="blog_card" src="'.$no_image.'" alt="" width="'.$img_width.'" height="'.$img_height.'" />';
	    }

		$nlink .='
	<div class="blog-card">
	  <a href="'. $url .'">
	      <div class="blog-card-thumbnail">'. $img_tag .'</div>
	      <div class="blog-card-content">
	          <div class="blog-card-title">'. $title .' </div>
	          <div class="blog-card-excerpt">'. $excerpt .'</div>
	      </div>
	      <div class="clear"></div>
	  </a>
	</div>';

		return $nlink;
	}
	add_shortcode("nlink", "nlink_scode");	























?>