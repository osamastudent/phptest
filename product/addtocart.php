
<?php
include'../conn.php';
if(isset($_POST["addtocart"]))
{
$select=mysqli_query($conn,"select * from user");
while($show=mysqli_fetch_array($select)){
$u_fk_id=$show["u_id"];
}


$name=$_POST["name"];
$detail=$_POST["detail"];
$price=$_POST["price"];
$qty=$_POST["qty"];
$pimage=$_POST["pimage"];

$check=mysqli_query($conn,"select * from addtocart where p_name='$name'");
if(mysqli_num_rows($check)>0)
{
echo'
<script>
alert("product alreday added");
window.location.href="viewproduct.php"
</script>
';
}
else
{
$insert=mysqli_query($conn,"insert into `addtocart` values(null,'$u_fk_id','$name','$detail','$price','$qty','$pimage')");
if($insert)
{
echo'
<script>
alert(" added to cart successfully");
window.location.href="viewproduct.php"
</script>

';
}
}

}
?>
