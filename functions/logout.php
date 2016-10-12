<?php 

	setcookie('user', null);
	header('Location: '. $_SERVER['HTTP_REFERER']);
	die();
