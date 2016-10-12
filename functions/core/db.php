<?php 

	function dbConnection()
	{
		global $dbConnection;

		if(!$dbConnection)
		{
			$dbConnection = mysql_connect('54.93.123.143', 'itstep_user', 'eCqq1qcsTHKuTf6p');

			if(!$dbConnection)
			{
				die('Failed to connect DB!');
			}

			if(!mysql_select_db('itstep', $dbConnection))
			{
				die('DB does not exist\'s!');
			}
		}

		return $dbConnection;
	}

	function dbGetSingle($table, $where = null, $order = null)
	{
		$connection = dbConnection();

		if($where)
		{
			$where = 'WHERE ' . $where;
		}

		if($order)
		{
			$order = 'ORDER BY ' . $order;
		}

		$query = sprintf('SELECT * from %s %s %s LIMIT 0,1', $table, $where, $order);
		$queryResult = mysql_query($query);

		if(mysql_num_rows($queryResult) > 0)
		{
			return mysql_fetch_array($queryResult);
		}

		return null;
	}