<?php
 echo ucfirst("uc first pakistan vs india and banladesh");
echo"<br>";
 echo ucwords("ucwords pakistan vs india and banladesh");
 echo"<br>";
 echo lcfirst("Strlen Pkistan vs india and banladesh");
 echo "<br>";

 echo strtolower("strtolower KARACHI <BR>");

 echo strtoupper("strtoupper karachi <BR>");

 
?>


<?php
include'../conn.php';
if(isset($_POST["addtocart"])){

    $user=mysqli_query($conn,"select u_id from users ");
$fetch=mysqli_fetch_array($user);
    $fk_idd=$fetch['u_id'];

$fk_id=$fk_idd;
    $pname=$_POST["pname"];
$pdetail=$_POST["pdetail"];
$pqty=$_POST["pqty"];
$pprice=$_POST["pprice"];
$pimage=$_POST["pimage"];
$select=mysqli_query($conn,"select * from addtocart where p_name='$pname'");
if(mysqli_num_rows($select)>0){
    echo '
    <script>
    alert("product already added");
    window.location.href="index.php"
    </script>
    ';
    
}
else{
$insert=mysqli_query($conn,"insert into addtocart values(null,'$fk_id','$pname','$pdetail','$pqty','$pprice','$pimage')");
if($insert){
echo '
<script>
alert("added to cart successfullly");
window.location.href="index.php"
</script>
';

}
}
}

?>