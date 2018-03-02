
<?php
	$num1 = $_GET["n1"];
	$num2 = $_GET["n2"];


	echo "First input: " . $num1 . "<br>";
	echo "Second input: " . $num2 . "<br>";
	echo "Addition result: " . ($num1 + $num2) . "<br>";
	echo "Deduction result: " . ($num1 - $num2) . "<br>";
	echo "Multiplication result: " . ($num1 * $num2) . "<br>";
	echo $num1 == 0 || $num2 == 0
			? "Error, division by 0."
			: "Division result: " . ($num1 / $num2) . "<br>";
?>
