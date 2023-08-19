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
<th>User Name</th>

<th>User Email</th>
<th>User Cell</th>
<th>User Address</th>

<th>Total Product </th>
<th>Total Price </th>

</thead>
<tbody>
<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from checkout");
$key="";
{
    while($row=mysqli_fetch_array($select))
    $key++;

?>

<tr class="text-center">
<td><?php echo $key; ?></td>
<td><?php echo $row[3]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><?php echo $row[6]; ?></td>
<td><?php echo $row[5]; ?></td>
<td><?php echo $row[7]; ?></td>
<td><?php echo $row[8]; ?></td>


</tr>

    <?php
{
    while($row=mysqli_fetch_array($select))
    $key++;

?>

<tr class="text-center">
<td><?php echo $key; ?></td>
<td><?php echo $row[3]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><?php echo $row[6]; ?></td>
<td><?php echo $row[5]; ?></td>
<td><?php echo $row[7]; ?></td>
<td><?php echo $row[8]; ?></td>


</tr>

    <?php
}
?>
</tbody>
</table>


<br><br><br>
<?php  include'../foot.php'; ?>
</body>
</html>