<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <table class="table">
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Porduct Quantity</th>
                <th>Porduct Price</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>

<?php
$conn=mysqli_connect('localhost',"root","","shop");
$sql="SELECT * FROM mycart";
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
while($row=mysqli_fetch_assoc($res)){

?>
            <tr>
                <td><img src="image/<?php echo $row['cart_snap']  ?>" width="30"></td>
                <td><?php echo $row['cart_name']  ?></td>
                <td><input type="number" style='width:50px' max='10' min='1'>
            <input type="button" value="Set" onclick="f(this)">
            </td>
                <td><p id="myprice"><?php echo $row['cart_price']  ?></p></td>
                <td>
                    <p id="output"></p>
                    <script>
                      function f(a){
                        var quantt=a.parentNode.childNodes[0].value; 
                        // console.log(quantt);
                        // var quant=Number(document.getElementById('quant').value);
                        var pri=a.parentNode.parentNode.childNodes[7].childNodes[0].innerHTML;
                        var price=Number(document.getElementById('myprice').innerHTML); 
                        total= quantt*pri
                        a.parentNode.parentNode.childNodes[9].childNodes[1].innerHTML=total; 
                    
                      }
                    </script>
                </td>
                <td>
                    <a href="del_pro.php?d=<?php echo $row['cart_id']?>"><input type="button" value="X" class="btn btn-danger"></a>
                </td>
            </tr>

<?php
}
}

?>
        </table>
    </div>
</body>
</html>