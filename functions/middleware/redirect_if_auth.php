<?php 

	if(user())
	{
		header('Location: http://itstep.dev/account');
		die();
	}