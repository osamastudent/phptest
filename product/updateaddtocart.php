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
<h1>Update Addtocart</h1>
<?php
include'../conn.php';
if(isset($_GET["delete"]))
{
$delete=$_GET["delete"];
$del=mysqli_query($conn,"delete from addtocart where ad_id='$delete'");
if($del)
{
    echo'
<script>
alert("deleted successfully");
window.location.href="viewcart.php"
</script>
';
}
else{
    echo'
<script>
alert("not deleted");
window.location.href="viewcart.php"
</script>
';
}
}

if(isset($_GET["update"]))
{
$update=$_GET["update"];
$select=mysqli_query($conn,"select * from addtocart where ad_id='$update'");
$data=mysqli_fetch_array($select);
}
if(isset($_POST["updateaddtocart"]))
{
 $adu_fk_id=$data["adu_fk_id"];
$name=$data["p_name"];
$detail=$data["p_detail"];
$price=$data["p_price"];
$qty=$_POST["qty"];
$pimage=$data["p_image"];
$insert=mysqli_query($conn,"update addtocart set adu_fk_id='$adu_fk_id', p_name='$name', p_detail='$detail', p_price='$price' ,p_quantity='$qty' , p_image='$pimage' where ad_id='$update'");
if($insert){
echo'
<script>
alert("updated successfully");
window.location.href="viewcart.php"
</script>
';
}

else{
    
    echo'
<script>
alert("updated failed");
window.location.href="viewcart.php"
</script>
';
}
}

?>

<form action="" method="post" class="offset-2" enctype="multipart/form-data">
<h4>Type Your Quantity</h4>
<input type="number" min="1" name="qty" value="<?php echo $data['p_quantity']; ?>" class="form-control w-75"><br>

<input type="submit" value="Update Addtocart" name="updateaddtocart" class="btn btn-primary form-control w-75 rounded-pill">
</form><br>

<?php

?>







<?php  include'../foot.php'; ?>
</body>
</html>