<?php

	$host="tcp:dbseriver.database.windows.net";
	$user="agoel001";
	$pass="Sumologic12!";
	$dbname="dbseriver";
//Data Source=tcp:dbseriver.database.windows.net,1433;Initial Catalog=ECommerce;User ID=agoel001@dbseriver;Password=Sumologic12!
	
	$con=mysqli_connect($host, $user, $pass, $dbname);
	
	if(!$con)
	{
		echo 'Database could not be connected! Please contact us by reporting an error';
		die();
	}
?>
