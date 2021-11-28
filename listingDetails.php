<?php 
include "db-connection.php";
$result = mysqli_query($db,"SELECT * FROM product");
?>
<!DOCTYPE html>
<html>
<head>
<style>
.img-container {
    text-align: center;
}
</style>
</head>
<body>
<div class="img-container">
<img src="flashlight.jpg" alt="flashlight" width="200" height="200">
</div>
<h2>Details:</h2>
<?php 
if (mysqli_num_rows($result) > 0){
?>
<table>
<tr>
<td>productName</td>
<td>category</td>
<td>description</td>
<td>stock</td>
<td>price</td>
<td>listedBy</td>
</tr>
<?php 
$i=0;
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row["productName"]; ?></td>
<td><?php echo $row["category"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo $row["stock"]; ?></td>
<td><?php echo $row["price"]; ?></td>
<td><?php echo $row["listedBy"]; ?></td>
</tr>
<?php 
$i++;
}
?>
</table>
<?php
}
else{
    echo "no results found";
}
?>
</body>
</html>
