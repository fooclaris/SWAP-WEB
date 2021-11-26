<html>
<body>
<?php
$con = mysqli_connect("localhost","root","","tp_amc"); 
if (!$con){
die('Could not connect: ' . mysqli_connect_errno()); 
}
$query= $con->prepare("UPDATE users SET username=?, password=?, address=?, firstName=?, lastName=?, mobileNumber=?, email=? WHERE user_id=?");


$username = "james charles";
$password = "password";
$address = 'under the bridge';
$firstName = 'sen';
$lastName = 'sinatraa';
$mobileNo = '90902323';
$email = 'iforgor@email.com';
$ID = '1';
$query->bind_param('ssssssss', $username, $password, $address, $firstName, $lastName, $mobileNo, $email, $ID);
if ($query->execute()){
 echo "Query executed.";
}else{
 echo "Error executing query.";
}
?>
</body>
</html>
