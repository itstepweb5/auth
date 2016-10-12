<?php 

	global $errors, $message;
	$errors = [];


	// Validate data
	foreach (['name', 'surname', 'email'] as $key) 
	{
		if(!isset($_POST[$key]) || $_POST[$key] == '')
		{
			$errors[$key] = 'You have to enter ' . str_replace('_', ' ', $key) . '!';
		}
	}

	if(count($errors) == 0)
	{
		// Save data
		$dbConnection = dbConnection();

		$query = sprintf(
			'UPDATE its_users SET name="%s", surname="%s", login="%s" WHERE id=' . user()['id'], 
			$_POST['name'],
			$_POST['surname'],
			$_POST['email']
		);
		$queryResult = mysql_query($query);

		if($queryResult)
		{
			user(null);
			$message = "Saved!";
		}
		else
		{
			$errors['server'] = 'Unexpected error. Please try again!';
		}

	}


