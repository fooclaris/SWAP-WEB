
<html>
<body>
<?php
$con = mysqli_connect("localhost","root","","tp_amc"); 
if (!$con){
die('Could not connect: ' . mysqli_connect_errno()); 
}
$query= $con->prepare("DELETE FROM users WHERE user_id=?");

$ID = '1';
$query->bind_param('s', $ID); 
if ($query->execute()){
 echo "Query executed.";
}else{
 echo "Error executing query.";
}
?>
</body>
</html>
