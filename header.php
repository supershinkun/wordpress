</!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if(is_category()): ?>
		<?php elseif(is_archive()): ?>
		<meta name="robots" content="noindex,follow">
		<?php elseif(is_search()): ?>
		<meta name="robots" content="noindex,follow">
		<?php elseif(is_tag()): ?>
		<meta name="robots" content="noindex,follow">
		<?php elseif(is_paged()): ?>
		<meta name="robots" content="noindex,follow">
		<?php endif; ?>
		<title>
		<?php
			global $page, $paged;
			if(is_front_page()):
			elseif(is_single()):
			wp_title('|',true,'right');
			elseif(is_page()):
			wp_title('|',true,'right');
			elseif(is_archive()):
			wp_title('|',true,'right');
			elseif(is_search()):
			wp_title('|',true,'right');
			elseif(is_404()):
			echo'404 |';
			endif;
			bloginfo('name');
			if($paged >= 2 || $page >= 2):
			echo'-'.sprintf('%sページ',
			max($paged,$page));
			endif;
		?>
		</title>
		<!--スマホ対応-->
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles/default.css">
		<!-- font awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<!-- bootstrap -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-4.2.1-dist/bootstrap.css" type="text/css">
		<!-- googlefont -->
		<link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet">

		<!-- hljs -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/default.min.css">

		<!-- jquery削除 -->
		<?php wp_deregister_script('jquery'); ?>

		<!-- hljs -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/shards.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/trianglify.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/highlight.pack.js"></script>
		<!-- object-fit（IE対策）-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.3/ofi.js"></script>

		<!-- twittercard読み込み -->
		<?php get_template_part('twitter-card');?>
		<!-- ダッシュボードの表示　-->
		<?php wp_head(); ?>


		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136150463-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-136150463-1');
		</script>
		<!-- google adsense -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		     (adsbygoogle = window.adsbygoogle || []).push({
		          google_ad_client: "ca-pub-2625715554076703",
		          enable_page_level_ads: true
		     });
		</script>


	</head>

<body <?php body_class(); ?>>
<!--ヘッダー-->
<header>
	<div class="site_info">
		<div class="container">
			<a href="<?php echo home_url(); ?>">
				<img class="blog_title" src="<?php echo get_template_directory_uri()?>/img/shinkun_log.png">
			</a>
			<!-- <a href="<?php //echo home_url(); ?>"><img src="<?php //get_template_directory_uri()?>/img/shinkun_log.png"></a> -->
			<!-- <h1><a href="<?php //echo home_url(); ?>"><?php //bloginfo('name'); ?></a></h1> -->
			<!-- <p><?php //bloginfo('description'); ?></p> -->
		</div>
	</div>

	<!--ヘッダー画像-->
	<!--<?php //if(get_header_image()): ?>
		<img src="<?php //header_image(); ?>" 
		width="<?php //echo get_custom_header()->width; ?>" 
		height="<?php //echo get_custom_header()->height; ?>" 
		alt="">
	<?php //endif; ?>-->

	<nav>
		<div class="container">
			<?php wp_nav_menu('theme_location=navigation'); ?>
		</div>
	</nav>
</header>
<!---->





