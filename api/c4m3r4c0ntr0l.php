<?php
/*
PHP-API Servo Controller by Muhammad Alfiyan Syamsuddin, 
International Exchange Program, Anan National College of Technology 2015

this script receive HTTP request from main server and send command to corresponded shell script
*/

session_start();

//test only
$_SESSION['sid'] = 123;

if(isset($_POST['session'])){
	if($_POST['session'] == $_SESSION['sid']){
		if(isset($_POST['action'])){
			$response = array();
			if($_POST['action'] == 'd'){
				echo "down";
				exec("/var/www/html/move.sh d");
			}else if($_POST['action'] == 'u'){
				echo "up";
				exec("/var/www/html/move.sh u");
			}else if($_POST['action'] == 'r'){
				echo "right";
				exec("/var/www/html/move.sh r");
			}else if($_POST['action'] == 'l'){
				echo "left";
				exec("/var/www/html/move.sh l");
			}else if($_POST['action'] == 'D'){
				echo "DOWN";
				exec("/var/www/html/move.sh D");
			}else if($_POST['action'] == 'U'){
				echo "UP";
				exec("/var/www/html/move.sh U");
			}else if($_POST['action'] == 'R'){
				echo "RIGHT";
				exec("/var/www/html/move.sh R");
			}else if($_POST['action'] == 'L'){
				echo "LEFT";
				exec("/var/www/html/move.sh L");
			}else{
				echo "Wrong action!";
			} 
			print_r($response,true);
		}else{
			echo "No action!";
		}
	}else{
		echo "Wrong session ID";
	}
}else{
	echo "No session detected!";
}