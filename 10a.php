<!DOCTYPE html>
<html>
<head>
	<title>student records</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background-color: lightgray;
		}
		.box{
			margin:15px 0px 15px 20px;
			/*display: inline-block;*/
			position: relative;
			width: 100%;
			height: 180px;
			top: 0px;
			/*justify-content: left;*/
			background-color: aliceblue;
			padding: 5px 5px;
			box-shadow: 2px 2px 6px 1px blue;
		}
		fieldset{
			color: blue;
			border:2px solid blue;
			border-radius: 2px 2px 2px 2px;
			margin: auto;
			padding: 5px;
		}
		label{
			/*margin: 5px 5px;*/
			/*padding: 5px;*/
		}
		.before{
			margin:15px 20px 5px 0px;
			position: absolute;
			width: 45%;
			height: 250px;
			top: 0px;
			right: 0px;
			background-color: aliceblue;
			padding: 5px 10px;
			box-shadow: 2px 2px 6px 1px blue;
			overflow: auto;
		}
		.b_table{
			align-content: center;
			border-collapse: collapse;
			text-align: center;
			margin: auto;
			width: 80%;
			border:2px solid black;
			
		}
		.b_table td,th{
			border:1px solid black;	
		}
		.b_table thead{
			background-color: lightblue;
		}
		.b_table tbody tr:nth-child(odd){
			background-color: lightgray;
		}
		.bottom{
			/*margin:10px auto;*/
			position: absolute;
			width: 45%;
			height: 300px;
			/*top: 0px;*/
			left:710px;
			margin-top:20px; 
			background-color: aliceblue;
			padding: 5px 10px;
			box-shadow: 2px 2px 6px 1px blue;
			overflow: auto;
		}

	</style>
</head>
<body>
	<form method="post" action="#">
		<div class="box">
			<h2 align="center">Student Details</h2>
			<fieldset>
				<legend>Student Details</legend>
						<label>USN:</label>&nbsp;&nbsp;&nbsp;
						<input type="text" name="usn">
						<label>Name:</label>&nbsp;
						<input type="text" name="name">
						<label>Address:</label>
						<textarea name="address"> Adress here..</textarea>
			</fieldset>
			<input type="submit" name="submit">
			<input type="reset" name="clear">
		</div>
	</form>
	<?php
		// $self=$_SERVER['PHP_SELF'];
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "college";
        $a=array();
        // Create connection
        // Opens a new connection to the MySQL server
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection and return an error description from the last connection //error, if any
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        if(isset($_POST['name']))
		{
			$usn=$_POST['usn'];
			// echo $usn;
			$name=$_POST['name'];
			// echo $name;
			$address=$_POST['address'];
			if($usn!=' ' && $name!=' ')
			{
				$query="INSERT INTO student (usn,name,address) VALUES ('$usn','$name','$address')";
				
				$result=mysqli_query($conn, $query);
				if (!$result) 
					echo "records not inserted";
				else
					echo "values inserted";
			}
		}
		// if ($result->num_rows > 0)
        echo "<div class='before'>";
		echo "<center> <h3>BEFORE SORTING</h3> </center>";
        echo "<table class='b_table'> <caption>Student Records</caption>";
        echo "<thead><th>USN</th><th>NAME</th><th>Address</th></tr></thead>";
        echo "<tbody><tr>";
        $sql = 'SELECT * FROM student';
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
           		echo "<tr>";
               	echo "<td>". $row['usn']."</td>";
               	echo "<td>". $row['name']."</td>";
               	echo "<td>". $row['address']."</td></tr>";
               	array_push($a,$row['usn']);
           	}
           	echo "</tbody></table></div>";
        }
        else 
	   		echo "0 results";
		// $conn->close();
        
        $n=count($a);
        $b=$a;
        for ( $i = 0 ; $i< ($n - 1) ; $i++ )
        {
            $pos= $i;
            for ( $j = $i + 1 ; $j < $n ; $j++ ) {
                if ( $a[$pos] > $a[$j] )
                    $pos= $j;
            }
            if ( $pos!= $i ) {
                $temp=$a[$i];
                $a[$i] = $a[$pos];
                $a[$pos] = $temp;
            }
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0)// output data of each row
        {
            while($row = $result->fetch_assoc()) {
                for($i=0;$i<$n;$i++) {
                    if($row["usn"] == $a[$i]) {
                        $c[$i]=$row["name"];
                        $d[$i]=$row["address"];
                    }
                }
            }
        }
        echo "<div class='bottom'>";
        echo "<center><h3> AFTER SORTING </h3> <center>";
        echo "<table class='b_table'><caption>Student Records</caption>";
        echo "<thead><th>USN</th><th>NAME</th><th>Address</th></tr></thead>";
        for($i=0;$i<$n;$i++) {
            echo "<tr>";
            echo "<td>". $a[$i]."</td>";
            echo "<td>". $c[$i]."</td>";
            echo "<td>". $d[$i]."</td></tr>";
        }
        echo "</table></div>";
        $conn->close();
    ?>
	
</body>
</html>