<!DOCTYPE html>
<html lang="en">
<?php  include'../header.php'; ?>

<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.2.js"integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="crossorigin="anonymous"></script>    
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<title>Document</title>

<body>
<?php  include'../sidebar.php'; ?>  
<?php  include'../navbar.php'; ?>


<?php
include'../conn.php';

if(isset($_GET["update"])){
$update=$_GET["update"];
$fetch=mysqli_query($conn,"select * from category where c_id='$update'");
$show=mysqli_fetch_array($fetch);
}
if(isset($_POST["updatecategory"]))
{
$name=$_POST["name"];
$insert=mysqli_query($conn,"update category set c_name='$name' where c_id='$update'");
if($insert)
{
echo'
<script>
alert("category updated successfully");
window.location.href="category.php"
</script>

';
}
else{
    echo'
<script>
alert("updated failed");
window.location.href="category.php"
</script>

';
}
}
?>


<h1>Update  Category:</h1><br><br>
<form action="" method="post" class="offset-2">
<input type="text" value="<?php echo $show[1];  ?>" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Category Name"><br>
<input type="submit" value="Update" name="updatecategory" class="btn btn-primary form-control w-75 rounded-pill">
</form><br>




<?php  include'../foot.php'; ?>
<?php  include'../script.php'; ?>
</body>
</html>