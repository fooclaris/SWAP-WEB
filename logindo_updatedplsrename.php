<?php
session_start();
function authenticate( $username, $password)
{
	if(empty($username) || empty($password))
	{
		die("Username or Password is empty!");
	}
	// encrypt password using sha256
	$random_salt = hash('sha256', uniqid(openssl_random_pseudo_bytes(16), TRUE)); //creates salt value
	$encrypted_password=base64_encode(hash("sha256",$password));
	$con = mysqli_connect("localhost", "root", "","tp_amc")or
	die("cannot connect");
	$sql=$con->prepare("SELECT user_id, username , password , role FROM users WHERE
	username='$username' and password='$encrypted_password'");
	$result=$sql->execute();
	$sql->bind_result($user_id, $username, $password, $role);
	// If result matched $myusername and $password
	if($sql->fetch()){
		//if($_SESSION['status'] == 'd'){
			//	echo "Your account has been deactivated.";
			//}else{
				// Register $role, $username and redirect to respective
				$_SESSION['user_id'] = $user_id;
				$_SESSION['role'] = $role;
				$_SESSION['username'] = $username;
				if ($_SESSION['role'] == "default") {
					// redirect user to member page if role is member
					session_start();
					header("location:home.php");
				}else if($_SESSION['role'] == "admin") {
					// redirect user to admin page if role is admin
					session_start();
					header("location:admin.php");
				}
			} else{
				echo "Invalid user or wrong password";
				// // Password is not correct
				// // We record this attempt in the database
				// $now = time();
				// $sql->prepare("INSERT INTO login_attempts(user_id, time)
				// VALUES ('$user_id', '$now')");
				// $sql->bind_param('is',$user_id,$time);
				// return false;
			}
			//	}
		}
		// function check_brute($user_id, $con){
		// 	// Get timestamp of current time 
		// 	$now = time();
			
		// 	// All login attempts are counted from the past 2 hours. 
		// 	$valid_attempts = $now - (2 * 60 * 60);
			
		// 	if ($stmt = $con->prepare("SELECT time 
		// 	FROM login_attempts <code><pre>
		// 	WHERE user_id = ? 
		// 	AND time > '$valid_attempts'")) {
		// 		$stmt->bind_param('i', $user_id);
				
		// 		// Execute the prepared query. 
		// 		$stmt->execute();
		// 		$stmt->store_result();
				
		// 		// If there have been more than 5 failed logins 
		// 		if ($stmt->num_rows > 5) {
		// 			return true;
		// 		} else {
		// 			return false;
		// 		}
		// 	}
		// }
		
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		authenticate($username, $password);
		//check_brute($user_id,$con);
		?>
