<?php	

function printmessage($message) {
	// echo "<script>console.log(\"$message\");</script>";
	echo "<pre>$message<br></pre>";
}
$checkall=true;
$checkall=$checkall && checkpost("username",true,"");
$checkall=$checkall && checkpost("password",true,"");
if (!$checkall) {
	printmessage("Error checking inputs<br>Please return to login page");
	header("location: login.php");
	die();
}else{
	logindo($_POST["username"], $_POST["password"]);
};
// return true if checks ok
function checkpost($input, $mandatory, $pattern) {
	
	$inputvalue=$_POST[$input];
	
	if (empty($inputvalue)) {
		printmessage("$input field is empty");
		if ($mandatory) return false;
		else printmessage("but $input is not mandatory");
	}
	if (strlen($pattern) > 0) {
		$ismatch=preg_match($pattern,$inputvalue);
		if (!$ismatch || $ismatch==0) {
			printmessage("$input field wrong format <br>");
			if ($mandatory) return false;
		}
	}
	return true;
}

function debug() {
	echo "<pre>";
	echo "--------------------------------------------<br>";
	echo "_SESSION<br>";
	print_r($_SESSION);
	echo "_COOKIE<br>";
	print_r($_COOKIE);
	echo "session_name()= " . session_name();
	echo "<br>";
	echo "session_id()= " . session_id();
	echo "<br>";
	echo "</pre>";
}

function logindo($username, $pwd) {
	
	require "db-connection.php";
	//require "fxprinttable.php";
	
	function printerror($message, $con) {
		echo "<pre>";
		echo "$message<br>";
		if ($con) echo "FAILED: ". mysqli_error($con) . "<br>";
		echo "</pre>";
	}
	
	function printok($message) {
		echo "<pre>";
		echo "--------------------------------------------<br>";
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
		printerror("Connecting to $db_hostname", $con);
		die();
	}
	else printok("Connecting to $db_hostname");
	
	$result=mysqli_select_db($con, $db_database);
	if (!$result) {
		printerror("Selecting $db_database",$con);
		die();
	}
	else printok("Selecting $db_database");
	
	$query="SELECT  user_id,username, role FROM tp_amc.users
	WHERE username ='$username'
	AND password = SHA1('$pwd')";
	$result=mysqli_query($con,$query);
	if (mysqli_num_rows($result) !== 1) {
		header('location: loginform.php');
		$msg = "<pre><a>Username or Password is incorrect please try again.</a></pre>";
		die();
	}
	else 
	printok($query);
	$nrows=mysqli_num_rows($result);
	echo "<pre>#rows=$nrows</pre>";
	echo "<br>";
	$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo "<pre>";
	// print_r works
	// print_r($data);
	//array2texttable($data);
	echo "</pre>";
	
	// ------------------------------------
	// Add username into the global variable $_SESSION
	session_start();
	printok("Started session");
	debug();
	// You should session_start first before inserting into $_SESSION
	$_SESSION["username"]=$data[0]["username"]; 
	$_SESSION["role"]=$data[0]["role"]; 
	$_SESSION["user_id"]=$data[0]["user_id"];
	$_SESSION['role'] == "admin";
	
	if((isset($_SESSION['role']) && $_SESSION['role'] == "admin")){
		header("location: admin.php");
	}else{
		header("location: home.php");
	}
	printok("Added username & role into _SESSION");
	
	// the path matters when you delete the cookie again, needs to match
	setcookie("colour", "red", time()+30*24*60*60, "/"); 
	setcookie("weather","good", time()+30*24*60*60, "/");
	printok("Added cookie colour=red");
	debug();
	// print_r($_SESSION);
	// ------------------------------------
	
	mysqli_free_result($result);
	
	mysqli_close($con);
	printok("Closing connection");
}
?>



<html>
<body>
<?php include "nav-bar.php"?>
<form class="form" method="post" action="logindo.php">
<input type="text" name="username" placeholder="Username">
<input type="text" name="password" placeholder="Password">
<a href="result"></a>
<button>Sign in</button>
<a href="registerUser.php">If you do not have an account click here</a>
<?php echo $msg ?> 
</form>
</body>
</html>
