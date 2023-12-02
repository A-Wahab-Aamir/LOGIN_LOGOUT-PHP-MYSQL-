<?php

$id1=$_GET['c'];
$conn=mysqli_connect('localhost','root','','shop');
$sql="SELECT * FROM product WHERE pro_id='{$id1}' ";
$res=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);
$id=$row['pro_id']; 
$name=$row['pro_name']; 
$detail=$row['pro_detail']; 
$price=$row['pro_price']; 
$snap=$row['pro_snap']; 
// move_uploaded_file($img_temp,'image/'.$snap);
$sql2="INSERT INTO cart VALUES ('{$id}','{$name}','{$detail}','{$snap}','{$price}') ";
mysqli_query($conn,$sql2);
header('Location:index.php');
?>