<html>
<body>
<?php
$con = mysqli_connect("localhost", "root","","tp_amc"); //connect to database
if (!$con) {
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail  
}

$query= $con->prepare("INSERT INTO `user` (`NAME`,`USERNAME`,`PASSWORD`, `ROLE`) VALUES
(?,?,?,?)");

$name = 'Eileen';
$pwd = 'eileen1';
$role = 'ADMIN';

$query->bind_param('ssss', $name, $name, $pwd, $role); //bind the parameters

if ($query->execute()){ //execute query
    echo "Query executed.";
}
else {
    echo "Error executing query.";
}


?>
</body>

</html>
