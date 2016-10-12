<?php 
	/*
	 * Return authorised user 
	 *
	 * @return Array
	 */
	function user($object = false)
	{
		global $user;

		if($object !== false)
		{
			$user = $object;
			return $user;
		}

		if(isset($_COOKIE['user']) && !$user)
		{
			$user = dbGetSingle('its_users', 'id = ' . intval($_COOKIE['user']));
		}

		return $user;
	}