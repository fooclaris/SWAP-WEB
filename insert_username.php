<html>
<body>
<?php
$con = mysqli_connect("localhost", "root","","tpamc"); //connect to database
if (!$con) {
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail  
}

$query= $con->prepare("INSERT INTO `user` (`NAME`,`USERNAME`,`PASSWORD`, `ROLE`, `ADDRESS`) VALUES
(?,?,?,?,?)");

$name = 'Aaron';
$pwd = 'Aaron88';
$role = 'ADMIN';
$address = 'Blk 333 Bedok';

$query->bind_param('sssss', $name, $name, $pwd, $role, $address); //bind the parameters

if ($query->execute()){ //execute query
    echo "Query executed.";
}
else {
    echo "Error executing query.";
}


?>
</body>

</html>
