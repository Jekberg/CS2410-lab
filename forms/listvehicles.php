<?php
	require "connectdb.php";
	echo "<table>";
	echo "<thead>";
	echo "<th>Reg_no</th>";
	echo "<th>Category</th>";
	echo "<th>Brand</th>";
	echo "<th>Dailyrate</th>";
	echo "<th>Description</th>";
	echo "</thead>";
	echo "<tbody>";
	foreach($db->query("SELECT * FROM vehicles") as $row)
	{
		echo "<tr>";
		echo "<td>" . $row["reg_no"] . "</td>";
		echo "<td>" . $row["category"] . "</td>";
		echo "<td>" . $row["brand"] . "</td>";
		echo "<td>" . $row["daily_rate"] . "</td>";
		echo "<td>" . $row["description"] . "</td>";
		echo "</td>";
	}
	echo "</tbody>";
	echo "</table>";
?>
