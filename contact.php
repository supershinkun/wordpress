<?php
	/*
	Template Name: お問い合わせ
	*/
?>

<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';
} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';
    // 空チェック
    if ($name == '' || $email == '' || $subject == '' || $message == '') {
        $err_msg = '全ての項目を入力してください。';
    }
    // エラーなし（全ての項目が入力されている）
    if ($err_msg == '') {
        $to = 'shinkunlog@gmail.com'; // 管理者のメールアドレスなど送信先を指定
        $headers = "From: " . $email . "\r\n";
        // 本文の最後に名前を追加
        $message .= "\r\n\r\n" . $name;
        // メール送信
        mail($to, $subject, $message, $headers);
        // 完了メッセージ
        $complete_msg = '送信されました！';
        // 全てクリア
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}
?>

<!--header取得-->
<?php get_header(); ?>
<!---->

<!--メインページ-->
<main id="main" class="single_page">
<div class="container">
<div class="row"><!--レスポンシブのgridに必要-->
<!--メインカラム-->
<div class="content col-xs-12 col-md-8">
		<!--記事-->
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<article <?php post_class('single-page'); ?>>
			<!--タイトル-->
			<h1><?php the_title(); ?></h1>
			<!---->


            <?php if ($err_msg != ''): ?>
                <div class="alert alert-danger">
                    <?php echo $err_msg; ?>
                </div>
            <?php endif; ?>

            <?php if ($complete_msg != ''): ?>
                <div class="alert alert-success">
                    <?php echo $complete_msg; ?>
                </div>
            <?php endif; ?>

            <form method="post" id="form">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="お名前(必須)" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="メールアドレス(必須)" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="件名(必須)" value="<?php echo $subject; ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="10" placeholder="本文(必須)"><?php echo $message; ?></textarea>
                </div>
                <div class="form-group">
                	<button type="submit" class="btn btn-primary btn-block">送信</button>
                </div>
            </form>



		</article>
		<?php endwhile; endif; ?>
		<!---->
</div>


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
<!--container-->

<!--footer取得-->
<?php get_footer(); ?>
<!---->


