<!DOCTYPE html>
<html lang="en">
<?php  include'../header.php'; ?>
<?php  include'../script.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css">
<title>Document</title>

<body>
<?php  include'sidebar.php'; ?>
<?php  include'../navbar.php'; ?>
<h1>view product</h1>
<div class="container">
<div class="box-container">

<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from product");

while($row=mysqli_fetch_array($select))
{
?>
<div class="main">

<form action="addtocart.php" method="post"  enctype="multipart/form-data">


            <img src="productimages/<?php echo $row[5] ?>" class="mx-auto d-block img-responsive" style="width: 170px; height:150px; margin-top:5px; margin-bottom:10px;"/> <br>
            <h4><?php echo $row[2] ?></h4>
            <h4>Rs.<?php echo number_format($row[3],2); $row[3] ?></h4>
<hr>
            <input type="hidden" name="name" value="<?php echo $row["p_name"]  ?>" class="form-control w-75 rounded-pill" placeholder="Enter Product Name">
            <input type="hidden" value="<?php echo $row["p_detail"]  ?>" name="detail" class="form-control rounded-pill" style="width:5px;" placeholder="Enter Product Detail">
            <input type="hidden" value="<?php echo $row["p_price"]  ?>" name="price" class="form-control w-75 rounded-pill" placeholder="Enter Product Price">

            <div class="d-flex">
 <span class="mt-1 pr-2 pl-2">Quantity</span><input MIN="1" type="number" name="qty" class="form-control w-50 mb-2" ></div>

<input type="hidden" value="<?php echo $row["p_image"]  ?>" name="pimage" class="form-control w-75 rounded-pill">
<input type="submit" value="Addtocart" name="addtocart" class="btn btn-primary form-control w-100 ">


       </form>  
       
       </div>


          
<?php  
}

?>
</div>
</div>
<?php  include'../foot.php'; ?>
</body>
</html>