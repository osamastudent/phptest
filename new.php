<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>
<body>
    
<table class="table table-striped table-bordered" style="width:100%">
        <thead>
    <tr>
      <th >index</th>
      <th>Phone No</th>
      <th>name</th>
      <th>Address</th>
      <th>Email</th>
      <th>Password</th>
      <th>Actions</th>
    </tr>
  </thead>
        <tbody>
        <?php
        include'conn.php';

        $select=mysqli_query($conn,"select * from admin");
$key=0;
while($row=mysqli_fetch_array($select))
{
$key++;

?>
   <tr>
      <th scope="row"><?php echo  $key; ?></th>
      <td><?php  echo $row[1]; ?></td>
      <td><?php  echo $row[2]; ?></td>
      <td><?php  echo $row[3]; ?></td>
      <td><?php  echo $row[4]; ?></td>
      <td><?php  echo $row[5]; ?></td>
      <td><a href="index.php?update=<?php echo $row["a_id"];  ?>">Update</a> 
      <a href="index.php?delete=<?php echo $row["a_id"];  ?>">Delete</a> 
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
        paging:false
    }      
    );
} );
</script>
 

<table class="table table-striped table-bordered" style="width:100%">
        <thead>
    <tr>
      <th >index</th>
      <th>Phone No</th>
      <th>name</th>
      <th>Address</th>
      <th>Email</th>
      <th>Password</th>
      <th>Actions</th>
    </tr>
  </thead>
        <tbody>
        <?php
        include'conn.php';
$select=mysqli_query($conn,"select * from admin");
$key=0;
while($row=mysqli_fetch_array($select))
{
$key++;

?>
   <tr>
      <th scope="row"><?php echo  $key; ?></th>
      <td><?php  echo $row[1]; ?></td>
      <td><?php  echo $row[2]; ?></td>
      <td><?php  echo $row[3]; ?></td>
      <td><?php  echo $row[4]; ?></td>
      <td><?php  echo $row[5]; ?></td>
      <td><a href="index.php?update=<?php echo $row["a_id"];  ?>">Update</a> 
      <a href="index.php?delete=<?php echo $row["a_id"];  ?>">Delete</a> 
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
        paging:false
    }      
    );
} );
</script>
</body>
</html>