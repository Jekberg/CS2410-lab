<!DOCTYPE html>
<html>
<head>
  <title>Lab 4 tasks </title>
</head>

<body>
	<h1>Lab 4 tasks</h1>

	<!-- Task 1: String-->
	<!-- write your solution to Task 1 here -->
	<div class="section">
		<h2>Task 1 : String</h2>
		<?php
			$str = "I love programming";
			echo $str;
		?>
		<br>
		<?php
			echo "First letter is: " . $str[0];
		?>
		<br>
		<?php
			echo "Length is: " . strlen($str);
		?>
		<br>
		<?php
			echo "Last letter is: " . $str[strlen($str) - 1];
		?>
		<br>
		<?php
			echo "First 6 letters are: "; 
			for($i = 0; $i < 6; ++$i)
				echo $str[$i];
		?>
		<br>
		<?php
			echo "In capital: " . strtoupper($str);
		?>
	</div>

	<!-- Task 2: Array and image-->
	<!-- write your solution to Task 2 here -->
	<div class="section">
		<h2>Task 2 : Array and image</h2>
		<img alr = "pic Name" width = "20%"
			<?php
				$images = ['earth.jpg', 'flower.jpg', 'plane.jpg', 'tiger.jpg'];
				echo 'src = "' . '/images/' . $images[rand() % count($images)] . '"';
			?>
		>	
		
	</div>	

	<!-- Task 3: Function definition dayinmonth  -->
	<!-- write your solution to Task 3 here -->
	<div class="section">
		<h2>Task 3 : Function definition</h2>
		<?php
			function daysInMonth($m)
			{
				switch($m)
				{
				case 1:
					return 31;
				case 2:
					return 28;
				case 3:
					return 31;
				case 4:
					return 30;
				case 5:
					return 31;
				case 6:
					return 30;
				case 7:
					return 31;
				case 8:
					return 31;
				case 9:
					return 31;
				case 10:
					return 31;
				case 11:
					return 30;
				case 12:
					return 31;
				}
			}
			for($i = 1; $i <= 12; ++$i)
				echo '<br> Month ' . $i . " => days " . daysInMonth($i);
		?>
	
	
	</div>
	

	
	<!-- Task 4: Favorite Artists from a File (Files) -->
	<!-- write your solution to Task 4 here -->
	<div class="section">
		<h2>Task 4: My Favorite Artists from a file</h2>
		
		<?php
			$lines = file("favorite.txt");
			echo "<ol>";
			foreach($lines as &$s)
			{
				echo '<li><a href = "http://www.mtv.com/artists/' . str_replace(" ", "_", strtolower($s)) . '">' . $s . '</a></li>';
			}
			echo "</ol>";
		?>
		
	</div>
	
	<!-- Task 6: Directory operations -->
	<!-- write your solution to Task 6 here -->
	<div class="section">
		<h2>Task 6 : Directory operations</h2>
		<?php
			echo '<ol>';
			foreach(scandir('.') as &$content)
				echo '<li>' . $content . '</li>';
			echo '</ol>';
		?>
		
	</div>

	<!-- Task 6 optional: Directory operations -->
	<!-- write your solution to Task 6 optional here -->
	<div class="section">
		<h2>Task 6 optional: Directory operations optional</h2>
		<?php
			function list_rec($folder)
			{
				$res = "";
				foreach(scandir($folder) as &$sub)
				{
					$res .= "<li>" . $folder . $sub . "</li>";
					$res .= list_rec($folder . $sub);
				}
				return $res;
			}
			echo "<ol>";
			//echo list_rec(".");
			echo "</ol>";
		?>
	</div>
	</div


	
    <!-- Task 5: including external files -->
	<!-- write your solution to Task 5 here -->
	<div class="section">
		<h2>Task 5: including external files</h2>
		<?php
			require "footer.php";
		?>		
	</div>

</body>
</html>
