<?php
session_start();
if(!isset($_SESSION['sid'])){
	header('Location: login.php');
}
?>
<html>
<head>
	<title>Camera Control System</title>


	<script src="scripts/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
	<script src="semantic/dist/semantic.min.js"></script>

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

	<script src="semantic/dist/components/form.js"></script>
	<script src="semantic/dist/components/transition.js"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">

	<style type="text/css">
		body > .ui.container {
			margin-top: 3em;
		}
		iframe {
			border: none;
			width: calc(100% + 2em);
			margin: 0em -1em;
			height: 300px;
		}
		iframe html {
			overflow: hidden;
		}
		iframe body {
			padding: 0em;
		}

		.ui.container > h1 {
			font-size: 3em;
			text-align: center;
			font-weight: normal;
		}
		.ui.container > h2.dividing.header {
			font-size: 2em;
			font-weight: normal;
			margin: 4em 0em 3em;
		}


		.ui.table {
			table-layout: fixed;
		}

		#control-group {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="ui container">
		<div class="ui secondary pointing menu">
			<a class="active item">
				Home
			</a> <!--
			<a class="item">
			Messages
			</a>
			<a class="item">
			Friends
		</a>-->
		<div class="right menu">
			<a class="ui item" href="logout.php">
				Logout
			</a>
		</div>
	</div>
	<h1>Camera Control System</h1>
	<div class="ui two column stackable grid segment">
		<div class="column">
			<h3 class="ui center aligned header">Current Image</h3>
			<div id="current-container" class="ui segment loading">
					<!--
					<div id="current" class="loading">
						<img src="img/current.jpg" class="ui fluid image">
						<script type="text/javascript">
							//remove loading when image loaded
							$(new Image()).on('load', function(){
								$("#current").removeClass("loading");
							}).prop('src',$('#current').prop('src')).each(function(){ if(this.complete) $(this).trigger('load');});
						</script>
					</div>
				-->
			</div>
		</div>
		<div class="column">
			<h3 class="ui center aligned header">Controls</h3>
			<div class="ui aligned center segment" id="control-group">
				<button class="ui icon button" id="up1">
					<i class="arrow up icon"></i>
				</button>
				<button class="ui icon button" id="right1">
					<i class="arrow right icon"></i>
				</button>
				<button class="ui icon button" id="down1">
					<i class="arrow down icon"></i>
				</button>
				<button class="ui icon button" id="left1">
					<i class="arrow left icon"></i>
				</button>
			</div>
			<div id="progress-refresh" class="ui progress" data-percent="100">
				<div class="bar" style="transition-duration: 50000ms; width: 100%;"></div>
			</div>
			<script type="text/javascript">
			$("#up1").click(function(){
				$.post("c4m3r4c0ntr0l.php",
					{
						session: "123",
						action: "u"
					},
					function(data,status){

					});
			});

			$("#down1").click(function(){
				$.post("c4m3r4c0ntr0l.php",
					{
						session: "123",
						action: "d"
					},
					function(data,status){

					});
			});

			$("#right1").click(function(){
				$.post("c4m3r4c0ntr0l.php",
					{
						session: "123",
						action: "r"
					},
					function(data,status){

					});
			});

			$("#left1").click(function(){
				$.post("c4m3r4c0ntr0l.php",
					{
						session: "123",
						action: "l"
					},
					function(data,status){

					});
			});
			</script>
		</div>
	</div>
	<div class="ui vertical footer">
		<div class="ui stackable divided equal height stackable grid segment">
			<!--
			<div class="three wide column">
			
				<h4 class="ui header">About</h4>
				<div class="ui link list">
					<a href="#" class="item">Sitemap</a>
					<a href="#" class="item">Contact Us</a>
					<a href="#" class="item">Religious Ceremonies</a>
					<a href="#" class="item">Gazebo Plans</a>
				</div>
			</div>
			<div class="three wide column">
				<h4 class="ui header">Services</h4>
				<div class="ui link list">
					<a href="#" class="item">Banana Pre-Order</a>
					<a href="#" class="item">DNA FAQ</a>
					<a href="#" class="item">How To Access</a>
					<a href="#" class="item">Favorite X-Men</a>
				</div>
			</div> -->
			<div class="column center segment" id="footer">
				<h4 class="ui header">Camera Control</h4>
				<p>@2015 Muhammad Alfiyan Syamsuddin, Anan National College of Technology</p>
			</div>
		</div>
	</div>
</div>
</div>	

<script type="text/javascript">
	var refreshtime = 180000;

	// image refresh controller, in sync with progress bar, not efficient 	
	$(document).ready(function(){
		var interval = refreshtime;
		var refresh = function(){
			$.ajax({
				url: "curimg.php",
				cache: false,
				success: function(data){
					$('#current-container').addClass("loading");
					$('#current-container').html(data);
					setTimeout(function(){
						$('#progress-refresh').progress({ 
							total: 100,
							percent: 0 
						});
						refresh();
					}, interval);
				}
			});
		};
		refresh();
	});

	$('#progress-refresh').progress({ 
		total: 100,
		percent: 0 
	});

	$(document).ready(function(){
		var inter = refreshtime / 100;
		var updateprog = function(){
			setTimeout(function(){
				$('#progress-refresh').progress('increment');
				updateprog();	
			}, inter);
		};
		updateprog();
	});	
</script>
</body>
</html>