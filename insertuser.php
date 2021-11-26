<html>
<body>
<?php
$con = mysqli_connect("localhost","root","","tp_amc"); 
if (!$con){
   die('Could not connect: ' . mysqli_connect_errno()); 

}
$query= $con->prepare("INSERT INTO `users` (`username`, `password`, `address`, `firstName`, `lastName`, `mobileNumber`, `email`, `role`) VALUES
(?,?,?,?,?,?,?,?)");

$username='ADMIN USER1';
$pwd = 'admin1pwd';
$address = 'ang mo kio ave 2';
$firstName = 'JiaLe';
$lastName = 'smexy';
$mobileNo = '11223344';
$email = 'admin1@email.com';
$role = 'ADMIN';

$query->bind_param('ssssssss', $username, $pwd, $address, $firstName, $lastName, $mobileNo, $email, $role); 
if ($query->execute()){
 echo "Query executed.";
}
else{
 echo "Error executing query.";
}
?>
</body>
</html>
