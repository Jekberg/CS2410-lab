<?php
	$db;
	try
	{
		$db = new PDO("mysql:dbname=carrent;host=127.0.0.1", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e;
	}
?>
