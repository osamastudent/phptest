<?php
include'../conn.php';
if(isset($_GET["delete"])){
$del=$_GET["delete"];
$query=mysqli_query($conn,"delete from addtocart where ad_id='$del'");
if($query){
echo'
<script>
alert("deleted successfully");
window.location.href="viewcart.php"
</script>
';
}
}

/* delete end */

if(isset($_GET["update"])){
$up=$_GET["update"];
$select=mysqli_query($conn,"select * from addtocart where ad_id='$up'");
$fetch=mysqli_fetch_array($select);
}
?>

<h1>Update Form</h1>
<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="pname" value="<?php echo $fetch['p_name'] ?>" id=""><br>
<input type="number" name="pqty" value="<?php echo $fetch['p_quantity'] ?>" id=""><br>
<input type="file" name="pimage" value=""><br>
<input type="submit" value="update" name="updatecart">
</form>


<?php
include'../conn.php';
if(isset($_POST["updatecart"])){
$pname=$_POST["pname"];
$pqty=$_POST["pqty"];
$pimage=$_FILES["pimage"]["name"];
move_uploaded_file($_FILES['pimage']['tmp_name'], '../product/productimages/'.$pimage);
if($pimage==""){
    $upquery=mysqli_query($conn,"update addtocart set p_name='$pname', p_quantity='$pqty' where ad_id='$up'");
    echo'
    <script>
    alert("updated without picture");
    window.location.href="viewcart.php"</script>
    ';
}
else{
    move_uploaded_file($_FILES['pimage']['tmp_name'], '../product/productimages/'.$pimage);
$upquery=mysqli_query($conn,"update addtocart set p_name='$pname', p_quantity='$pqty', p_image='$pimage' where ad_id='$up'");
echo'
<script>
alert("updated with  picture");
window.location.href="viewcart.php"</script>
';
}
}

?>
