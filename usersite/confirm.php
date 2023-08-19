<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
session_start();

include'../conn.php';
if(isset($_POST["confirm"])){
    @$fk_id=1;
    $uname=$_POST["uname"];
$uphone=$_POST["uphone"];
$uaddress=$_POST["uaddress"];
$uemail=$_POST["uemail"];
$upass=$_POST["upass"];
@$productqty=$_POST["productqty"];
@$totalprice=$_POST["totalprice"];


if(empty($uname)){
    $_SESSION['error']="name must be required";
    header("location:checkout.php");
    }


    elseif(empty($uphone)){
        $_SESSION["error"]="phone no must be required";
        header("location:checkout.php");
        }
    
        elseif(empty($uaddress)){
            $_SESSION["error"]="address must be required";
            
            }
    
            
            elseif(empty($uemail)){
                $_SESSION["error"]="email must be required";
                }
                elseif(empty($upass)){
                    $_SESSION["error"]="password must be required";
                    }
            
                    elseif(empty($productqty)){
                        $_SESSION["error"]="can not be null";
                        }
                        elseif(empty($totalprice)){
                            $_SESSION["error"]="required";
                            }
                        


            
else{
    $insert=mysqli_query($conn,"insert into checkout values(null,'$fk_id','$uname','$uphone','$uaddress','$uemail','$upass','$productqty','$totalprice')");

}
}

?>

<?php
if(isset($_SESSION["error"])){
echo'
<div class="alert alert-primary" role="alert">
'. $_SESSION["error"].'
</div>

';
}
  ?> 