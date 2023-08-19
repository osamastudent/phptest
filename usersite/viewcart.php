   
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
<div class="tab">
<h1 class="text-center">You Added this </h1>
    
<table class="table ">
<thead class="bg-dark text-light">
<th>product name</th>
<th>product detail</th>

<th>product quantity</th>
<th>product price</th>
<th>Total price of product</th>
<th>image</th>
<th>actions</th>
</thead>
<tbody>
<?php
include'../conn.php';
$select=mysqli_query($conn,"select * from addtocart");
while($row=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $row[2] ?></td>
<td><?php echo $row[3] ?></td>
<td><?php echo $row[4] ?></td>
<td><?php echo $row[5] ?></td>
<td><?php echo $row['p_price'] * $row['p_quantity'] ?></td>
<td><img src="../product/productimages/<?php echo $row[6] ?>" height="100"></td>
<td><a class="text-dark" href="update.php?delete=<?php echo $row['ad_id'] ?>">Delete</a>
<a class="text-dark" href="update.php?update=<?php echo $row[0] ?>">Update</a>
</td>
</tr>

<?php @$total+=$row['p_quantity']*$row['p_price'] ?>
<?php
}

?>
</tbody>
</table>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3">
<h1 class="bg-dark text-light text-center " style="font-family:arial">total: <?php echo @$total ?></h1>
</div>
<div class="col-md-3"> <a href="checkout.php"><h1 class=" btn btn-primary text-light text-center" style="font-family:arial">check out</h1></a></div>
<div class="col-md-3"></div>
</div>
<br>
</div>
</div>
</div>
<?php  
include'foot.php';
?>
</body>
</html>