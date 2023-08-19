<?php session_start();?>   
<!DOCTYPE html>
<html lang="en">
<?php include'header.php'; ?>
<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="#"><img src="images/aptechlogo.jpg" height="100" class="rounded-circle"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="index.html">Home</a></li>
                                  
                                    <li><a href="about.html">about</a></li>
                                    
                                    <li><a href="blog.html">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <?php
include'../conn.php';
$sel=mysqli_query($conn,"select * from addtocart");
$count=mysqli_num_rows($sel);                            
          
          
          
          ?>
          <li><a href="viewcart.php"><span class="flaticon-shopping-cart"><sup><b>(<?php echo @$count  ?>)</b></sup></span></a> </li>

                                    <li>
                                    <div class="dropdown">
  <button class="btn btn-outline-white bg-info  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="text-light  ">Dropdown button</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" style="margin-top:-20px;" href="#">log out </a></li><br>
    <li><a class="dropdown-item" style="margin-top:-20px; href="#">login</a></li> <br>
    <li><a class="dropdown-item" style="margin-top:-20px; href="#">register</a></li>
  </ul>
</div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>



<div class="container-fluid ">
<div class="main bg-light">
<br> <h1 class=" offset-4">confirm your order</h1>
<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from addtocart");
while($fetch=mysqli_fetch_array($select)){
?>


<div class="row">
<div class="col-md-5"></div>
<div class="col-md-4">
<b><?php echo $fetch['p_name'] ?> &nbsp;&nbsp;(<?php echo $fetch['p_quantity'] ?>)</b>
<b> <?php  @$total+=$fetch['p_quantity']*$fetch['p_price']; ?></b>
</div>
<?php
}
?><br>
<div class="col-md-3"> </h1></div>
 </div>

 <div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"><h1>Total: Rs.<?php echo number_format(@$total,2) ?></div>
<div class="col-md-4"></div>
 </div>
 <hr class="border border-dark">
<br><br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<?php
if(isset($_SESSION["error"])){
echo'
<div class="alert alert-primary" role="alert">
'. $_SESSION["error"].'
</div>

';
}
?>
<form action="confirm.php" method="post">
<input type="text" name="uname" value="" placeholder="Enter Your Name" class="form-control rounded-pill"><br>
<input type="text" name="uphone" placeholder="Enter Your Phone No" class="form-control rounded-pill"><br>
<input type="text" name="uaddress" placeholder="Enter Your Address" class="form-control rounded-pill"><br>
<input type="text" name="uemail" placeholder="Enter Your Email" class="form-control rounded-pill"><br>
<input type="text" name="upass" placeholder="Enter Your Password" class="form-control rounded-pill"><br>

<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from addtocart");
while($row=mysqli_fetch_array($select)){

 @$productqty.=$row['p_name'] ." ". '('.$row['p_quantity'].')';
 @$totalprice+=$row['p_price']* $row['p_quantity']; 
}

?>

<input type="hidden"  name="productqty" value="<?php  echo @$productqty ?>" id="">
<input type="hidden" name="totalprice" value="<?php echo @$totalprice ?>" id="">
<input type="submit" name="confirm" value="Confirm Your Order"  class="form-control btn bg-primary btn-outline-warning block rounded-pill"><br>
<br>
</form>
</div>
<div class="col-md-2"></div>

</div>

<br><br>
</div>
</div>
</div>
<?php  
include'foot.php';

?>

</body>
</html>

