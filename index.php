<?php
session_start();
if(!isset($_SESSION['admin_login'])){
    header('location:login.php'); 
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">LOGIN</a></li>
  <li><a href="logout.php">LOGOUT</a></li>
  <li style="float:right"><a href="mycartdetail.php">
    <img src="image/cart.png" alt="" srcset="" width="25">
   <?php
 $conn=mysqli_connect('localhost',"root","","shop");
 $sql="SELECT COUNT(cart_id) AS mainid FROM `mycart`;";
 $res=mysqli_query($conn, $sql);
 $row=mysqli_fetch_assoc($res);
echo "<sup>".$row['mainid']."</sup>"; 

?>
 

  </a></li>
</ul>


<!--  -->



<div class="container mt-5">
        <div class="row">
<?php
$conn=mysqli_connect('localhost','root','','shop');
$sql='SELECT * FROM product';
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
while($row=mysqli_fetch_assoc($res)){
?>
        <div class="card m-3" style="width: 18rem;">
  <img src="<?php echo 'image/'.$row['pro_snap'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['pro_name']?></h5>
    <p class="card-text"><?php echo $row['pro_detail']?></p>
    <p class="card-text"><?php echo $row['pro_price']?></p>
    <!-- <a href="mycart.php"><input type="text" value='1' class='m-2' name='quan'></a> -->
    <a href="mycart.php?t1=<?php echo $row['pro_id']?>" class="btn btn-primary">Add to Cart</a>
    <a href="detail.php?pro_id=<?php echo  $row['pro_id']?> " class="btn btn-primary">View Detail</a>
  </div>
</div>
<?php
}
}
else{
  echo "YOU ARE DPOINMG WROMNG!"; 
}
?>
 </div>
</div>

<!--  -->
</body>
</html>


