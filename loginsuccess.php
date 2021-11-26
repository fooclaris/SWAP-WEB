session_start();

if (isset($_SESSION["username"]))
{
	echo "<pre><b>Login done</b><br></pre>";
	echo "<pre><h3>Welcome back <u>" . $_SESSION['username']. "</u></h3></pre>";
}
else {
	echo "<pre><b>Login not done</b><br></pre>";
	echo "<pre><h3><a href=loginform.php>You have not logged in. Please go back to login page</a></h3></pre>";
	die("");
}




