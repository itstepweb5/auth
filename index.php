<?php 
	require('config.php');

	require('functions/core/db.php');
	require('functions/core/layout.php');
	require('functions/core/user.php');
	
	$requestedResuorceURI = trim($_SERVER['REQUEST_URI'], '/');

	// if($requestedResuorceURI == '/account')
	// 	header('Location: http://itstep.dev/login');

	// Calculation 
	// data
	/// ...

	// Processing
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		switch($requestedResuorceURI)
		{
			case "register":
				require('functions/register.php'); break;
			case "login":
				require('functions/login.php'); break;
			case "account/settings":
				require('functions/middleware/check_if_auth.php');
				require('functions/account/settings.php'); 
				break;
			case "account/password/reset":
				require('functions/middleware/check_if_auth.php');
				require('functions/account/password_reset.php'); 
				break;
			default:
				echo 'Route not allowed';
				die();
		}
	}

	// Render content
	switch($requestedResuorceURI)
	{
		case "":
			require('templates/homepage.php'); break;
		case "register":
			require('templates/register.php'); break;
		case "login":
			require('functions/middleware/redirect_if_auth.php');
			require('templates/login.php'); break;
		case "logout":
			require('functions/logout.php'); break;
		case "account":
			require('functions/middleware/check_if_auth.php');
			require('templates/account/index.php'); 
			break;
		case "account/settings":
			require('functions/middleware/check_if_auth.php');
			require('templates/account/settings.php'); 
			break;
		default:
			require('templates/404.php');
	}