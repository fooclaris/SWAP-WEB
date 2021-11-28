<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You have not logged in.<br/>";
    echo "Please <a href='loginform.php'>login</a>.";
    exit;
}

include "db-connection.php";

$userID = $_SESSION['user_id'];

$query = "SELECT * FROM users
          WHERE user_id=$userID";


$con=mysqli_connect($db_hostname,$db_username,$db_password);
$result=mysqli_select_db($con, $db_database);
$result=mysqli_query($con,$query);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
$_SESSION["firstName"]=$data[0]["firstName"]; 
$_SESSION["lastName"]=$data[0]["lastName"]; 
$_SESSION["address"]=$data[0]["address"];
$_SESSION['email'] =$data[0]["email"];
$_SESSION['mobileNumber'] =$data[0]["mobileNumber"];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <title>We Are Connected - Edit Profile</title>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include "nav-bar.php" ?>
        <h2>We Are Connected - Edit Profile</h2>
        <form method="post" action="updateProfile.php" enctype="multipart/form-data">
            <label>First Name:</label>
            <input type="text" name="firstName" value="<?php echo $data[0]["firstName"] ?>"/>
            <br>
            <label>Last Name:</label>
            <input type="text" name="lastName" value="<?php echo $data[0]["lastName"] ?>"/>
            <br>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $data[0]["email"] ?>"/>
            <br>
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $data[0]["address"] ?>"/>
            <br>
            <label>Mobile Number:</label>
            <input type="text" name="mobileNumber" value="<?php echo $data[0]["mobileNumber"] ?>"/>
            <input type="submit" value="Update"/>
        </form> 
    </body>
</html>
