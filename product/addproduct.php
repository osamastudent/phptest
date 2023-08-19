<?php 
session_start();
?>
<?php

function selectcategory()
{
    include'../conn.php';
    $dropdown=mysqli_query($conn,"select * from category");
    $option="";
    while($fetch=mysqli_fetch_array($dropdown))
    {
    $option .="<option value=".$fetch[0].">$fetch[1]</option>";
    }
    echo $option;
}
?>

<form action="" method="post" class="offset-2" enctype="multipart/form-data">
 
    <select name="pc_fk_id" class="form-control w-75 rounded-pill">
    <option value="">--Select Category--</option>
    <?php selectcategory(); ?>
    </select>
    <br>
<input type="text" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Product Name"><br>
<input type="text" name="price" class="form-control w-75 rounded-pill" placeholder="Enter Product Price"><br>
<input type="text" name="detail" class="form-control w-75 rounded-pill" placeholder="Enter Product Detail"><br>
<input type=

<!DOCTYPE html>
<html lang="en">
<?php  include'../header.php'; ?>
<?php  include'../script.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>

<body>
<?php  include'sidebar.php'; ?>
<?php  include'../navbar.php'; ?>
<h1>Add Product:</h1><br>

<?php
include'../conn.php';
if(isset($_POST["addproduct"]))
{
    $pc_fk_id=$_POST["pc_fk_id"];
$name=$_POST["name"];
$price=$_POST["price"];
$detail=$_POST["detail"];
$pimage=$_FILES["pimage"]["name"];

$allowedexten=array('jpeg','jpg');
$filename=$_FILES["pimage"]["name"];
$fileexten=pathinfo($filename,PATHINFO_EXTENSION);

if(!in_array($fileexten,$allowedexten)){
$errorn="jpeg and jpg allowed only";
}

elseif($_FILES['pimage']['size']>3500000){
    $errorn="image can not allowed more than 1 mb";
}
else{
move_uploaded_file($_FILES["pimage"]["tmp_name"],'productimages/'.$pimage);
$insert=mysqli_query($conn,"insert into product values(null,'$pc_fk_id','$name','$price','$detail','$pimage')");
if($insert)
{
echo'
<script>
alert("new product added successfully");
window.location.href="addproduct.php"
</script>

';
}
else{
    echo'
<script>
alert("added failed");
window.location.href="addproduct.php"
</script>

';
}
}
}
?>





<form action="" method="post" class="offset-2" enctype="multipart/form-data">
 
    <select name="pc_fk_id" class="form-control w-75 rounded-pill">
    <option value="">--Select Category--</option>
    <?php selectcategory(); ?>
    </select>
    <br>
<input type="text" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Product Name"><br>
<input type="text" name="price" class="form-control w-75 rounded-pill" placeholder="Enter Product Price"><br>
<input type="text" name="detail" class="form-control w-75 rounded-pill" placeholder="Enter Product Detail"><br>
<input type="file" name="pimage" accept="image/*,.pdf" class="form-control w-75 rounded-pill"><br>
  
<?php
if(isset($errorn)){
echo"
<div class='alert alert-dark rounded-pill fs-5 w-75'>
$errorn
</div>";
}
  ?>

<input type="submit" name="addproduct" class="btn btn-primary form-control w-75 rounded-pill">
</form>



<?php  include'../foot.php'; ?>
</body>
</html>