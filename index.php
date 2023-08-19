<!DOCTYPE html>
<html lang="en">
<?php  include'header.php'; ?>
<?php  include'script.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<title>Document</title>

<body>
    
<?php  include'sidebar.php'; ?>  
<?php  include'navbar.php'; ?>

<?php
include'conn.php';
if(isset($_GET["delete"]))
{
$delete=$_GET["delete"];
$delquery=mysqli_query($conn,"delete  from admin where a_id='$delete'");
if($delquery){
    echo'
    <script>
    alert("deleted successfull");
    window.location.href="index.php"
    </script>
    ';
    }
    else{
        echo'
        <script>
        alert("deleted failed");
        window.location.href="index.php"
        </script>
        ';
    }
}


include'conn.php';
if(isset($_GET["update"]))
{
$updated=$_GET["update"];
$selected=mysqli_query($conn,"select * from admin where a_id='$updated'");
$data=mysqli_fetch_array($selected);
if(isset($_POST["updateadmin"]))
{
$name=$_POST["name"];
$cell=$_POST["cell"];
$address=$_POST["address"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$upquery=mysqli_query($conn,"update admin set a_name='$name', ad_cell='$cell' , ad_address='$address' ,a_email='$email', a_password='$pass' where a_id='$updated'");
if($upquery){
echo'
<script>
alert("updated successfull");
window.location.href="index.php"
</script>
';
}
else{
    echo'
    <script>
    alert("not updated failed");
    window.location.href="index.php"
    </script>
    ';
}


}

?>
<h1 class="text-center">Update Form</h1>
<form action="" method="post" class="offset-2">
<input type="text"  value="<?php echo $data['a_name']; ?>" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Name"><br>
<input type="text" value="<?php echo $data['ad_cell']; ?>" name="cell" class="form-control w-75 rounded-pill" placeholder="Enter Cell"><br>
<input type="text" value="<?php echo $data['ad_address']; ?>" name="address" class="form-control w-75 rounded-pill" placeholder="Enter Address"><br>
<input type="text" value="<?php echo  $data['a_email']; ?>" name="email" class="form-control w-75 rounded-pill" placeholder="Enter Email"><br>
<input type="text" value="<?php echo $data['a_password']; ?>" name="pass" class="form-control w-75 rounded-pill" placeholder="Enter Password"><br>
<input type="submit" name="updateadmin" value="Update" class="btn btn-primary form-control w-75 rounded-pill">
</form>



<?php
}
else{
    include'conn.php';
    if(isset($_POST["addadmin"]))
    {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    
    $insert=mysqli_query($conn,"insert into admin values(null,'$name','$email','$pass')");
    if($insert){
    echo'
    <script>
    alert("added successfull");
    window.location.href="dashboard.php"
    </script>
    ';
    }
    else{
        echo'
        <script>
        alert("not added failed");
        window.location.href="index.php"
        </script>
        ';
    }
    
    
    }
    else{
?>
<h1 class="text-center">registration Form</h1>
<form action="" method="post" class="offset-2">
<input type="text" name="name" class="form-control w-75 rounded-pill" placeholder="Enter Name"><br>

<input type="text" name="email" class="form-control w-75 rounded-pill" placeholder="Enter Email"><br>
<input type="text" name="pass" class="form-control w-75 rounded-pill" placeholder="Enter Password"><br>
<input type="submit" name="addadmin" class="btn btn-primary form-control w-75 rounded-pill">
</form>


<?php

    }
}
?>
<hr>
<br><br>
<form action="" method="get" class="offset-2 ">
    <div class="input-group ">
<input type="text" name="search"class="w-75"  placeholder="search"><button class="btn btn-primary ">search</button>
</div>
</form>
<br>
<table class="table table-striped table-bordered" style="width:100%">
        <thead>
    <tr>
      <th >index</th>
      
      <th>name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(isset($_GET["search"]))
  {
$filter=$_GET["search"];
$select=mysqli_query($conn,"select * from admin where CONCAT(a_id,a_name,a_email,a_password) like '%$filter%'");
if(mysqli_num_rows($select)>0){
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
}
else{
?>


<div class="alert alert-primary text-center " role="alert">
No matching records found
</div>
<?php
}
}
 ?>

</tbody>
    
    </table> 
 


<?php  include'foot.php'; ?>
</body>
</html>