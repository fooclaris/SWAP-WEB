<?php
// php file that contains the common database connection code
include "db-connection.php";


$username = $_POST ['username'];
$pwd = $_POST ['password'];
$cfmpwd = $_POST['confirmPassword'];
$address = $_POST ['address'];
$firstName = $_POST ['firstName'];
$lastName = $_POST ['lastName'];
$mobileNumber = $_POST ['mobileNumber'];
$email = $_POST ['email'];
$role = 'default';

//encode and hashing
$hash="sha256";
$encrypted_password = base64_encode(hash($hash,$pwd)); //encodes and hashes and store the value

$con=mysqli_connect($db_hostname,$db_username,$db_password);
$result=mysqli_select_db($con, $db_database);
//checkes if the username has already been existed
$resultcheck="SELECT * FROM users WHERE username = '$username'";
$resultchecked=mysqli_query($con,$resultcheck);
if(mysqli_num_rows($resultchecked)){
$message = "Username has already been taken";
}else{
    //check if passwords match if not dont execute insertion
    if ($pwd !== $cfmpwd){
        $message = "Passwords do not match please try again.";
        
    }else{
        $query = $con->prepare("INSERT INTO users (username, password, address, firstName, lastName, mobileNumber, email, role) 
        VALUES (?,?,?,?,?,?,?,?)");
        $query->bind_param('ssssssss',$username,$encrypted_password,$address,$firstName,$lastName,$mobileNumber,$email,$role);
        if (!$query->execute()) {
            die();
            $message="Invalid fields please try again";
        }
        else
        
            $message = "Account successfully created!";
        
    }
}
///^[A-Za-z0-9._%+-]+@ADAB3D21.MZM$/i email regex
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <title>We Are Connected - Edit Profile</title>
    </head>
    <body>
        <?php include "nav-bar.php" ?>
        <h3>We Are Connected - Edit Profile</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>
