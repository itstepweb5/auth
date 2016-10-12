<?php 

	global $passwordResetErrors, $passwordResetMessage;
	$passwordResetErrors = [];


	// Validate data
	foreach (['password', 'password_confirmation'] as $key) 
	{
		if(!isset($_POST[$key]) || $_POST[$key] == '')
		{
			$passwordResetErrors[$key] = 'You have to enter ' . str_replace('_', ' ', $key) . '!';
		}
	}

	if(
		($_POST['password'] != $_POST['password_confirmation']) 
		&& !isset($passwordResetErrors['password'])
		&& !isset($passwordResetErrors['password_confirmation'])
	){
		$passwordResetErrors['password_confirmation'] = 'Password confirmation doesn\'t match!';
	}

	if(count($passwordResetErrors) == 0)
	{
		// Save data
		$dbConnection = dbConnection();

		$query = sprintf(
			'UPDATE its_users SET password=MD5("%s") WHERE id=' . user()['id'], 
			$_POST['password']
		);
		$queryResult = mysql_query($query);

		if($queryResult)
		{
			header('Location: http://itstep.dev/account/settings');
			die();
		}
		
		$passwordResetErrors['server'] = 'Unexpected error. Please try again!';
	}