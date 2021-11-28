<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not authorized to view this page";
    exit;
}
    $userID = $_SESSION['user_id'];

// php file that contains the common database connection code
include "db-connection.php";

$message = "";

if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['address']) && !empty($_POST['mobileNumber']) && !empty($_POST['email']))
    {
    
    } 
else
    {
        $message .="All profile details have to be provided. <br>";
        $message .="<a href='profile.php'> Try Again. </a><br>";
    }

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$email = $_POST['email'];
$mobileNumber = $_POST['mobileNumber'];

$query = "UPDATE users SET address='$address', firstName='$firstName', lastName='$lastName', mobileNumber='$mobileNumber', email='$email' WHERE user_id='$userID'";

$con=mysqli_connect($db_hostname,$db_username,$db_password);
$result=mysqli_select_db($con, $db_database);
$result=mysqli_query($con,$query);

if ($result) 
    {
        
        $message .= "Your profile has updated successfully. <br>";       
    }
else
    {
        $message .="All profile details have to be provided. <br>";
        $message .="<a href='editProfile.php'> Try Again. </a><br>";
        printf("Error: %s\n", mysqli_error($con));
    }
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