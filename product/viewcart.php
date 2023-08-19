<!DOCTYPE html>
<html lang="en">
<?php  include'../header.php'; ?>
<?php  include'../script.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Document</title>

<body>
<?php  include'sidebar.php'; ?>
<?php  include'../navbar.php'; ?>
<h1>You Have Added to cart</h1>
<table class="table table-bordered table-hover">
<thead class="text-center">
<th>Index</th>
<th>Product Name</th>
<th>Product Price</th>
<th>Product Detail</th>
<th>Product Quantity</th>
<th>Product Image</th>
<th>Total Product Price</th>
<th class="">Actions</th>
</thead>
<tbody>
<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from addtocart");
$key="";
while($row=mysqli_fetch_array($select))
{
    $key++;
@$totalprice+=$row['p_quantity']*$row['p_price'];
?>

<tr class="text-center">    
<td><?php echo $key; ?></td>
<td><?php echo $row[2]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><?php echo $row[3]; ?></td>
<td><?php echo $row[5]; ?></td>
<td><img src="productimages/<?php echo $row[6]; ?>" height="50"></td>
<td><?php echo $row['p_quantity']*$row['p_price'];;  ?></td>
<td>
<div class="d-flex">
<a class="text-decoration-none" href="updateaddtocart.php?update=<?php echo $row['ad_id'] ?>">Update</a>
  &nbsp;  <a class="text-decoration-none" href="updateaddtocart.php?delete=<?php echo $row['ad_id'] ?>">Delete</a>
    </div>
</td>
</tr>

    <?php
}
?>
</tbody>
</table>
<div class="row">
<div class="col-md-3">
<button type="button" class="btn btn-success">Cotinue Shopping</button>
</div>
<div class="col-md-4">
<b class="fs-4 pt-2">Grand Total: <?php  echo number_format(@$totalprice,2) ?></b>
</div>
<div class="col-md-3">
<a href="checkout.php" type="button" class="btn btn-primary">Proceed To checkout</a>
</div>

<div class="col-md-2">
<a href="viewcart.php?deleteall" onclick="return confirm('do you want to delete all?');" type="button" class="btn btn-dark"><i class="fa-solid fa-trash "> </i> Delete All</a>
</div>
</div>

<?php
if(isset($_GET["deleteall"]))
{
$delete=mysqli_query($conn,"delete  from addtocart ");

}

?>

<br><br><br>
<?php  include'../foot.php'; ?>
</body>
</html>