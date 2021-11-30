<html>
<head>
<title>Safe Lights</title>
<link rel="stylesheet" href="styles.css">
</head>
<style>
    body{
        color: white;
    }
	a{
		color: grey;
	}
</style>
<body>
<?php include "admin-nav-bar.php"?>
<div>
<?php	

printusers();

function printusers() {

	require "db-connection.php";
	require "printable.php";
	
	function printerror($message, $con) {
		echo "<pre>";
		echo "$message<br>";
		if ($con) echo "FAILED: ". mysqli_error($con) . "<br>";
		echo "</pre>";
	}

	function printok($message) {
		echo "<pre>";
		echo "$message<br>";
		echo "OK<br>";
		echo "</pre>";
	}

	try {
		$con=mysqli_connect($db_hostname,$db_username,$db_password);
	}
	catch (Exception $e) {
		printerror($e->getMessage(),$con);
	}
	if (!$con) {
		die();
	}

	$result=mysqli_select_db($con, $db_database);
	if (!$result) {
		die();
	}

	$query="SELECT user_id, username, password, address, firstName, lastName, mobileNumber, email, role FROM tp_amc.users";
	$result=mysqli_query($con,$query);
	if (!$result) {
		die();
	}

	$nrows=mysqli_num_rows($result);
	echo "<pre>#rows=$nrows</pre>";
	echo "<br>";

	$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo "<pre>";
	// print_r works
	// print_r($data);
	array2texttable($data);
	echo "</pre>";

	mysqli_free_result($result);

	mysqli_close($con);
	

}

?>
</div>
<div>
	<a href="editUsers.php">EDIT USERS</a>
</div>
</body>
</html>