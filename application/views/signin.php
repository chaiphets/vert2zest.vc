<link href="<?= base_url('lib/css/signin.css') ?>" rel="stylesheet">
<div>
	<form class="form-signin" role="form" name="login" action="index.php/authen/login" method="post">
		<div id="bg">
			<img class="logo" src="<?= base_url('images/logo_nobg.png') ?>" alt="">
		</div>
		<input id="txt_user" name="txt_user" type="email" class="form-control" placeholder="Email address" required="" autofocus="true">
		<input id="txt_pwd" type="password" class="form-control" placeholder="Password" required="">
		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me">
				Remember me </label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			Sign in
		</button>
	</form>
</div>

<script>
	$(function(){
		$('#sidebar-wrapper').hide();
		$('#wrapper').css('padding-left','0px');
	});
</script>