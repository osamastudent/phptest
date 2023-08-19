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
<h1>Check Out</h1>
<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from addtocart");
while($row=mysqli_fetch_array($select))
{
@$totalamount+=$row['p_quantity']*$row['p_price'];
?>
<div class="row">
<div class="col-4"></div>
<div class="col-md-4 bg-info">
<span class="offset-4"> <?php echo $row['p_name']?> </span> <span class="ml-3"> ( <?php echo $row['p_quantity']?> </span>)


</div>

<div class="col-4"></div>
</div>
<?php
}
?>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 text-bg-dark ">
<span class="offset-1 fs-2 ">Grand Total: <?php echo $totalamount  ?></span>
</div>
<div class="col-md-4"></div>
</div>
<br><br>

<form action="" method="post" class="offset-2">
<input type="text" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Name"><br>
<input type="text" name="email" class="form-control w-75 rounded-pill" placeholder="Enter Email"><br>

<input type="text" name="address" class="form-control w-75 rounded-pill" placeholder="Enter Address"><br>
<input type="text" name="cell" class="form-control w-75 rounded-pill" placeholder="Enter Cell"><br>

<input type="submit" name="checkout" class="btn btn-primary form-control w-75 rounded-pill">
</form>

<?php

include'../conn.php';
    if(isset($_POST["checkout"]))
    {

        $selectu=mysqli_query($conn,"select * from user");
        while($rowu=mysqli_fetch_array($selectu))
        {
$u_fk_id=$rowu["u_id"];
        }
        

        $selectp=mysqli_query($conn,"select * from product");
        while($rowp=mysqli_fetch_array($selectp))
        {
$p_fk_id=$rowp["p_id"];
        }


    $name=$_POST["name"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $cell=$_POST["cell"];
    
    $select=mysqli_query($conn,"select * from addtocart");
while($row=mysqli_fetch_array($select))
{
@$totalproduct.=$row['p_name'] . '('.$row['p_quantity'].')';
@$totalprice+=$row['p_price']*$row['p_quantity'];



}
    $insert=mysqli_query($conn,"insert into checkout values(null,'$u_fk_id','$p_fk_id','$name','$email','$address','$cell','$totalproduct','$totalprice')");
    if($insert){
    echo'
    <script>
    alert("successfull");
    window.location.href="checkout.php"
    </script>
    ';
    }
    else{
        echo'
        <script>
        alert("failed");
        window.location.href="checkout.php"
        </script>
        ';
    }
    
    
    }
    ?>


<?php  include'../foot.php'; ?>
</body>
</html>