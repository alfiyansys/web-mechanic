<?php
session_start();
if(isset($_SESSION['sid'])){
	header('location: index.php');
}
if(isset($_POST['password'])){
	$oripass = md5("ian");
	$inppass = md5($_POST['password']);
	if($oripass == $inppass){
		$denied = 0;
		$_SESSION['sid'] = md5(time());
	}else{
		$denied = 1;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Standard Meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- Site Properities -->
	<title>Camera Remote Control System Login</title>
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/reset.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/site.css">

	<link rel="stylesheet" type="text/css" href="semantic/dist/components/container.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/grid.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/header.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/image.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/menu.css">

	<link rel="stylesheet" type="text/css" href="semantic/dist/components/divider.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/segment.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/form.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/input.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/button.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/list.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/message.css">
	<link rel="stylesheet" type="text/css" href="semantic/dist/components/icon.css">

	<script src="scripts/jquery.min.js"></script>
	<script src="semantic/dist/components/form.js"></script>
	<script src="semantic/dist/components/transition.js"></script>

	<style type="text/css">
		body {
			background-color: #DADADA;
		}
		body > .grid {
			height: 100%;
		}
		.image {
			margin-top: -100px;
		}
		.column {
			max-width: 450px;
		}
	</style>
	<script>
		$(document)
		.ready(function() {
			$('.ui.form')
			.form({
				fields: {
					email: {
						identifier  : 'email',
						rules: [
						{
							type   : 'empty',
							prompt : 'Please enter your e-mail'
						},
						{
							type   : 'email',
							prompt : 'Please enter a valid e-mail'
						}
						]
					},
					password: {
						identifier  : 'password',
						rules: [
						{
							type   : 'empty',
							prompt : 'Please enter your password'
						},
						{
							type   : 'length[3]',
							prompt : 'Your password must be at least 6 characters'
						}
						]
					}
				}
			})
			;
		})
		;
	</script>
</head>
<body>

	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">
				<!-- <img src="assets/images/logo.png" class="image"> -->
				<div class="content">
					Superuser Login
				</div>
			</h2>
			<form id="login" class="ui large form" method="POST" action="login.php">
				<div class="ui stacked segment">
<!-- <div class="field">
<div class="ui left icon input">
<i class="user icon"></i>
<input type="text" name="email" placeholder="E-mail address">
</div>
</div> -->
<div class="field">
	<div class="ui left icon input">
		<i class="lock icon"></i>
		<input type="password" name="password" placeholder="Password" id="password" autofocus>
	</div>
</div>
<div class="ui fluid large teal submit button">Login</div>
</div>

<div class="ui error message">
	<?php 
	if(isset($denied) && $denied == 1){
		?>
		<ul class="list"><li>Wrong password!</li></ul>
		<script type="text/javascript">
			$('#login').addClass("error");
		</script>
		<?php
	}
	?>
</div>

</form>

<?php
if(isset($denied) && $denied == 0){
	?>
	<div class="ui message">
		<!-- New to us? <a href="#">Sign Up</a> -->
		Login success, redirecting....
		<script type="text/javascript">
			$("#password").attr("disabled", true);
			window.setTimeout(function() {
				window.location.href = 'index.php';
			}, 3000);
		</script>
	</div>
	<?php 
}
?>
</div>
</div>

</body>

</html>