<?php 

	global $errors;
	$errors = [];


	// Validate data
	foreach (['email', 'password'] as $key) 
	{
		if(!isset($_POST[$key]) || $_POST[$key] == '')
		{
			$errors[$key] = 'You have to enter ' . str_replace('_', ' ', $key) . '!';
		}
	}

	if(count($errors) == 0)
	{
		$user = dbGetSingle('its_users', 'login="'. $_POST['email'] . '" and password=MD5("' . $_POST['password'] . '")');

		if($user)
		{
			// Auth user
			setcookie('user', $user['id']);
			header('Location: http://itstep.dev/account');
			die();
		}

		$errors['unauthorized'] = 'This credentials doesn\'t match our records';
	}
