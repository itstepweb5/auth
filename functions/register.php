<?php 

	global $errors;
	$errors = [];


	// Validate data
	foreach (['name', 'surname', 'email', 'password', 'password_confirmation'] as $key) 
	{
		if(!isset($_POST[$key]) || $_POST[$key] == '')
		{
			$errors[$key] = 'You have to enter ' . str_replace('_', ' ', $key) . '!';
		}
	}

	if(
		($_POST['password'] != $_POST['password_confirmation']) 
		&& !isset($errors['password'])
		&& !isset($errors['password_confirmation'])
	){
		$errors['password_confirmation'] = 'Password confirmation doesn\'t match!';
	}


	if(count($errors) == 0)
	{
		// Save data
		$dbConnection = mysql_connect('54.93.123.143', 'itstep_user', 'eCqq1qcsTHKuTf6p');
		mysql_select_db('itstep', $dbConnection);

		$query = sprintf(
			'INSERT into its_users (name, surname, login, password) values '
			.'("%s", "%s", "%s", MD5("%s"))', 
			$_POST['name'],
			$_POST['surname'],
			$_POST['email'],
			$_POST['password']
		);
		$queryResult = mysql_query($query);

		if($queryResult)
		{
			// Auth user
			setcookie('user', mysql_insert_id($dbConnection));
			header('Location: http://itstep.dev');
			die();
		}

		$errors['server'] = 'Unexpected error. Please try again!';
	}
