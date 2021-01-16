<html>
<head>
	<title>PHP-Simple Calculator</title>
	<style type="text/css">
		body{
			align-items: center;
		}
		table, td, th
		{
			border: 1px solid black;
			width: 50%;
			text-align: center;
			background-color: aliceblue;
			/*justify-content: center;*/
			align-items: center;
			/*margin: auto;*/
		}
		table{ 
			/*margin: auto; */
			box-shadow:5px 10px 10px gray;
			border-radius: 10px;
		}
		p{ 
			text-align:right; 
		}
		input{
			width: 150px;
			background-color: lightgray;
			text-align: center;
			font-weight: bold;
			font-size: 14px;
			/*border-radius: 10px;*/
		}
		.a{
			border-radius: 10px;
		}
		.a:hover{
			background-color: yellow;
		}
	</style>
</head>
<body>
	<form method="post" action="#">
		<table>
			<caption><h2> SIMPLE CALCULATOR </h2></caption>
				<tr>
					<td>First Number:</td>
					<td><input type="text" name="num1" /></td>
					
				</tr>
				<tr>
					<td>Second Number:</td>
					<td><input type="text" name="num2"/></td>
				</tr>

				<tr>
					<td colspan="2"><input class="a" type="submit" name="submit" value="Calculate"></td>
				</tr>
	</form>
<?php
	if(isset($_POST['submit']))
	{
		$num1 = $_POST['num1'];
		$num2 = $_POST['num2'];
		if(is_numeric($num1) and is_numeric($num2))
		{
			echo "<tr><td> Addition :</td><td><p>".($num1+$num2)."</p></td>";
			echo "<tr><td> Subtraction :</td><td><p> ".($num1-$num2)."</p></td>";
			echo "<tr><td> Multiplication :</td><td><p>".($num1*$num2)."</p></td>";
			echo "<tr><td>Division :</td><td><p> ".($num1/$num2)."</p></td>";
			echo "</table>";
		}
		else
		{
			echo"<script type='text/javascript'>alert('ENTER VALID NUMBER');</script>";
		}
	}
?>
</body>
</html>