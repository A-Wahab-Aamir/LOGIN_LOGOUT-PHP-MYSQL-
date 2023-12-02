<?php 
$id=$_GET['t1'];
$conn=mysqli_connect('localhost',"root","","shop");
$sql="SELECT * FROM product WHERE pro_id={$id}";
$res=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);
$name=$row['pro_name']; 
$detail=$row['pro_detail']; 
$snap=$row['pro_snap']; 
$price=$row['pro_price']; 

$sql2="INSERT INTO mycart VALUES ('{$id}','{$name}','{$detail}','{$price}','{$snap}') ";
mysqli_query($conn,$sql2);
header('Location:index.php');

?>