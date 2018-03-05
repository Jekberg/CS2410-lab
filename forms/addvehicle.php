<?php
	require "connectdb.php";
	if(empty($_REQUEST["reg_no"]))
		fail("Registration number was not provided.");
	$reg_no = $db->quote($_REQUEST["reg_no"]);
	if(empty($_REQUEST["brand"]))
		fail("Vehicle brand was not provided.");
	$brand = $db->quote($_REQUEST["brand"]);
	if(!is_numeric($_REQUEST["daily_rate"]))
		fail("The daily rate is not a number.");
	$rate = $db->quote($_REQUEST["daily_rate"]);
	if(empty($_REQUEST["category"]))
		fail("The vehicle category was not provided.");
	$category = $db->quote($_REQUEST["category"]);
	if(empty($_REQUEST["description"]))
		fail("A description was not provided");
	$description = $db->quote($_REQUEST["description"]);
	try
	{
		$dbs = $db->prepare('INSERT INTO vehicles (reg_no, category, brand, description, daily_rate) VALUES (?, ?, ?, ?, ?)');
		$dbs->execute(array($reg_no, $category, $brand, $description, $rate));
		echo "Vechile addition successful!";
	}
	catch(PDOException $e)
	{
		fail($e->getMessage());
	}
	function fail($str)
	{
		echo $str;
		exit;
	}
?>
