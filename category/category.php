<!DOCTYPE html>
<html lang="en">

<?php include'../header.php'; ?>
<?php include'../script.php';  ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<title>Document</title>

<body>
<?php include'sidebar.php';  ?>
<?php include'../navbar.php';  ?>
<br><br>
<?php
include'../conn.php';
if(isset($_GET["delete"]))
{
$delete=$_GET["delete"];
$del=mysqli_query($conn,"delete from category where c_id='$delete'");
if($del)
{
    echo'
<script>
alert("deleted successfully");
window.location.href="category.php"
</script>
';
}
else{
    echo'
<script>
alert("not deleted");
window.location.href="category.php"
</script>
';
}
}
?>
<h1>Add Category:</h1><br><br>
<form action="" method="post" class="offset-2">
<input type="text" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Category Name"><br>
<input type="submit" name="addcategory" class="btn btn-primary form-control w-75 rounded-pill">
</form><br>

<?php
include'../conn.php';
if(isset($_POST["addcategory"]))
{
$name=$_POST["name"];
$insert=mysqli_query($conn,"insert into category values(null,'$name')");
if($insert)
{
echo'
<script>
alert("new category added successfully");
window.location.href="category.php"
</script>

';
}
else{
    echo'
<script>
alert("added failed");
window.location.href="category.php"
</script>

';
}
}
?>

<hr>

<table class="table">
        <thead>
        
    <tr>
<th>Index</th>
<th>Name</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from category");
$key="";
while($row=mysqli_fetch_array($select))
{
    $key++;
?>

<tr>
<th scope="row"><?php echo $key;  ?></td>
<td><?php  echo $row['c_name']; ?></td>
<td><a href="update.php?update=<?php echo $row['c_id'];?>">Update</a> &nbsp;
<a href="category.php?delete=<?php echo $row['c_id'];?>">delete</a></td>
</tr>


<?php
}

?>
</tbody>
</table>

<script>
    $(document).ready( function () {
    $('.table').DataTable(
        {
            paging:false
        }
    );
} );
</script>


<?php include'../foot.php';  ?>

</body>
</html>