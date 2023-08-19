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
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">   
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<title>Document</title>

<body>
<?php  include'sidebar.php'; ?>
<?php  include'../navbar.php'; ?>
<h1>Show Product:</h1><br>

<table class="table">
<thead>
<th>Index</th>
<th>Product Name</th>
<th>Product Price</th>
<th>Prduct Detail</th>
<th>Prduct Image</th>
<th>Actions</th>
</thead>
<tbody>
<?php 
include'../conn.php';
$select=mysqli_query($conn,"select * from product");
$key="";
while($row=mysqli_fetch_array($select)){
$key++;
?>

<tr>
<td><?php echo $key; ?></td>
<td><?php echo $row[2] ?></td>
<td><?php echo number_format($row["p_price"],2);?></td>
<td><?php echo $row[4] ?></td>
<td><img src="productimages/<?php echo $row[5] ?>" height="50" width="50"></td>
<td>
    <a href="update.php?update=<?php echo $row['p_id'] ?>">Update</a> &nbsp;
    <a href="update.php?delete=<?php echo $row['p_id'] ?>">Delete</a>
</td>
</tr>

<?php
}
?>






</tbody>
</table>

<script>
    $(document).ready( function () {
    $('.table').DataTable({
    
    });
} );
</script>

<?php  include'../foot.php'; ?>
</body>
</html>