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
<h1>Update Product:</h1><br>
<?php
include'../conn.php';
if(isset($_GET["delete"]))
{
$delete=$_GET["delete"];
$del=mysqli_query($conn,"delete from product where p_id='$delete'");
if($del)
{
    echo'
<script>
alert("deleted successfully");
window.location.href="showproduct.php"
</script>
';
}
else{
    echo'
<script>
alert("not deleted");
window.location.href="showproduct.php"
</script>
';
}
}




if(isset($_GET["update"]))
{
$update=$_GET["update"];

$select=mysqli_query($conn,"select * from product where p_id='$update'");
$data=mysqli_fetch_array($select);
}
if(isset($_POST["updateproduct"]))
{
 $pc_fk_id=$_POST["pc_fk_id"];
$name=$_POST["name"];
$price=$_POST["price"];
$detail=$_POST["detail"];
$pimage=$_FILES["pimage"]["name"];
if($pimage=="")
{
$insert=mysqli_query($conn,"update product set pc_fk_id='$pc_fk_id', p_name='$name', p_price='$price',p_detail='$detail'  where p_id='$update'");
echo'
<script>
alert("updated successfully without image");
window.location.href="showproduct.php"
</script>
';
}
else{
    move_uploaded_file($_FILES["pimage"]["tmp_name"],'productimages/'.$pimage);
    $insert=mysqli_query($conn,"update product set pc_fk_id='$pc_fk_id', p_name='$name', p_price='$price',p_detail='$detail' , p_image='$pimage' where p_id='$update'");
    echo'
<script>
alert("updated successfully with image");
window.location.href="showproduct.php"
</script>
';
}
}

?>

<form action="" method="post" class="offset-2" enctype="multipart/form-data">
<img src="productimages/<?php echo $data[5] ?>" height="300" width="350" class="offset-2 rounded-pill" alt="..."><br><br>

<select  name="pc_fk_id" class="form-control w-75 rounded-pill">
    <option value="">--Select Category--</option>
    <?php selectcategory(); ?>
    </select>
    <br>
<input type="text" value="<?php echo $data[2]  ?>" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Product Name"><br>
<input type="text" value="<?php echo $data[3]  ?>" name="price" class="form-control w-75 rounded-pill" placeholder="Enter Product Price"><br>
<input type="text" value="<?php echo $data[4]  ?>" name="detail" class="form-control w-75 rounded-pill" placeholder="Enter Product Detail"><br>
<input type="file" name="pimage" class="form-control w-75 rounded-pill"><br>
<input type="submit" value="Update" name="updateproduct" class="btn btn-primary form-control w-75 rounded-pill">
</form><br>

<?php

?>



<?php  include'../foot.php'; ?>
</body>
</html> 