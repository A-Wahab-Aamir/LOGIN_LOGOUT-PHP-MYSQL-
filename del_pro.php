<?php
$id=$_GET['d'];

$conn=mysqli_connect('localhost','root','','shop');
$sql="DELETE FROM mycart WHERE cart_id='{$id}'";
mysqli_query($conn,$sql);
header('Location:mycartdetail.php')



?>