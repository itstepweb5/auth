<?php 

	if(!user())
	{
		header('Location: http://itstep.dev/login');
		die();
	}