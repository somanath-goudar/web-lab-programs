<?php
	print "<h3> REFRESH PAGE </h3>";
	$name="counter.txt";
	$file = fopen($name,"r");
	$hits= fscanf($file,"%d");
	fclose($file);
	$hits[0]++;
	$file = fopen($name,"w");
	fprintf($file,"%d",$hits[0]);
	fclose($file);
	print "<h4> Total number of views: </h4>".$hits[0];
?>